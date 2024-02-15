<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcField;
use App\Models\Backend\NfcDesign;
use App\Models\Backend\NfcInformation;
use App\Models\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class NfcCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->paginate(10);
        return view('user.nfc-card.index', compact('nfc_cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nfc_fields = NfcField::all();
        return view('user.nfc-card.create', compact('nfc_fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Start the database transaction
        DB::beginTransaction();
        try {
            $nfc = new NfcCard;
            $nfc->client_id = currentUserId();
            $nfc->card_name = $request->card_name;
            $nfc->card_type = $request->card_type;
            $nfc->created_by = currentUserId();
            if ($nfc->save()) {

                /* Insert Data To Nfc Information */
                $nfc_info = new NfcInformation;
                $nfc_info->nfc_card_id = $nfc->id;
                $nfc_info->prefix = $request->prefix;
                $nfc_info->suffix = $request->suffix;
                $nfc_info->preferred_name = $request->preferred_name;
                $nfc_info->maiden_name = $request->maiden_name;
                $nfc_info->accreditations = $request->accreditations;
                $nfc_info->pronoun = $request->pronoun;
                $nfc_info->title = $request->title;
                $nfc_info->department = $request->department;
                $nfc_info->company = $request->company;
                $nfc_info->headline = $request->headline;
                $nfc_info->created_by = currentUserId();
                $nfc_info->save();

                /* Insert Data To Nfc Design */
                $nfc_design = new NfcDesign;
                $nfc_design->nfc_card_id = $nfc->id;
                $nfc_design->design_card_id = $request->design_card_id;
                $nfc_design->created_by = currentUserId();
                $nfc_design->save();

                /* Insert Data To Nfc Information */

                /*Nfc Field Data Insert */
                $nfcFieldIds = $request->input('nfc_field_id');
                if ($nfcFieldIds) {
                    $nfcFieldValues = $request->input('field_value');
                    // Find the NFC card
                    $nfcCard = NfcCard::findOrFail($nfc->id);
                    // Find the NFC fields
                    $nfcFields = NfcField::whereIn('id', $nfcFieldIds)->get();

                    // Attach NFC fields with values
                    foreach ($nfcFields as $nfcField) {
                        // Get the value corresponding to the current NFC field ID
                        $value = $nfcFieldValues[$nfcField->id];

                        // Associate the NFC field with the NFC card along with the value
                        $nfcCard->nfcFields()->attach($nfcField, ['field_value' => $value]);
                    }
                }
                // Commit the transaction if all operations are successful
                DB::commit();

                $this->notice::success('Nfc Card Successfully Created');
                return redirect()->route('nfc_card.index');
            }
        } catch (Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        return view('user.nfc-card.show', compact('nfc_card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        $nfc_info = NfcInformation::find($id);
        $nfc_fields = NfcField::all();
        return view('user.nfc-card.edit', compact('nfc_fields', 'nfc_card', 'nfc_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Start the database transaction
        DB::beginTransaction();
        try {

            // Find the NFC card by decrypting the ID
            $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
            $nfc_card->card_name = $request->card_name;
            $nfc_card->card_type = $request->card_type;
            //$nfc_card->updated_by = currentUserId();

            /* Update Data From Nfc Design */
            $nfc_design = NfcDesign::where('nfc_card_id', encryptor('decrypt', $id))->first();
            $nfc_design->design_card_id = $request->design_card_id;
            $nfc_design->updated_by = currentUserId();
            $nfc_design->save();

            /* Update Data From Nfc Information */
            $nfc_info = NfcInformation::where('nfc_card_id', encryptor('decrypt', $id))->first();
            $nfc_info->prefix = $request->prefix;
            $nfc_info->suffix = $request->suffix;
            $nfc_info->preferred_name = $request->preferred_name;
            $nfc_info->maiden_name = $request->maiden_name;
            $nfc_info->accreditations = $request->accreditations;
            $nfc_info->pronoun = $request->pronoun;
            $nfc_info->title = $request->title;
            $nfc_info->department = $request->department;
            $nfc_info->company = $request->company;
            $nfc_info->headline = $request->headline;
            $nfc_info->updated_by = currentUserId();
            $nfc_info->save();

            // Retrieve the existing pivot data associated with the NFC card
            $existingPivotData = $nfc_card->nfcFields()->pluck('nfc_field_id', 'nfc_field_id')->toArray();


            // Retrieve the new data from the request
            $nfcFieldIds = $request->input('nfc_field_id');
            if ($nfcFieldIds) {
                $nfcFieldValues = $request->input('field_value');

                // Prepare the data for sync
                $nfcFieldData = [];
                foreach ($nfcFieldIds as $index => $nfcFieldId) {
                    $value = $nfcFieldValues[$nfcFieldId];
                    $nfcFieldData[$nfcFieldId] = ['field_value' => $value];
                }

                // Synchronize the relationship, deleting any records not included in the new data
                $nfc_card->nfcFields()->sync($nfcFieldData, true);
            }

            // Save the NFC card
            $nfc_card->save();

            // Commit the transaction if all operations are successful
            DB::commit();

            $this->notice::success('Nfc Card Successfully Updated');
            return redirect()->route('nfc_card.index');
        } catch (Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NfcCard $nfcCard)
    {
        //
    }
    public function showqrurl($id)
    {
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        return view('user.nfc-card.showqrurl', compact('nfc_card'));
    }
    public function save_contact(Request $request)
    {
        $nfc_cards = NfcCard::with(['nfc_info', 'client'])->where('client_id', currentUserId())->where('id', $request->id)->get();

        // Initialize an empty vCard string
        $vCard = "";

        // Loop through each NFC card and create a vCard entry for each
        foreach ($nfc_cards as $nfc_card) {
            // Build vCard entry
            $vCard .= "BEGIN:VCARD\n";
            $vCard .= "VERSION:3.0\n";
            $vCard .= "N:" . $nfc_card->client->last_name . ";" . $nfc_card->client->fname . ";;;\n";
            $vCard .= "FN:" . $nfc_card->client->fname . " " . $nfc_card->client->last_name . "\n";
            $vCard .= "TEL;TYPE=CELL:" . $nfc_card->client->contact_no . "\n";
            $vCard .= "EMAIL:" . $nfc_card->client->email . "\n";
            $vCard .= "END:VCARD\n";
        }

        // Set headers for vCard file
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="contact.vcf"',
        ];

        // Return vCard as a response
        return response()->make($vCard, 200, $headers);
    }
}
