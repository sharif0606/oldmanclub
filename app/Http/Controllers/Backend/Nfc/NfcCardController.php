<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcField;
use App\Models\Backend\NfcDesign;
use App\Models\Backend\NfcInformation;
use App\Models\Backend\User;
use App\Models\User\Country;
use App\Models\Backend\NfcVirtualBackgroundCategory;
use App\Models\Backend\NfcVirtualBackground;

use App\Http\Controllers\Controller;
use App\Models\NfcCardBadges;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use PDF; // Import the PDF facade

class NfcCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', currentUserId())->paginate(10);
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.nfc-card.index', compact('nfc_cards', 'client', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nfc_fields = NfcField::all();
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        $categories = [
            '1' => 'Most Popular',
            '2' => 'Social',
            '3' => 'Communication',
            '4' => 'Payment',
            '5' => 'Video',
            '6' => 'Music',
            '7' => 'Design',
            '8' => 'Gaming',
            '9' => 'Other',
        ];
        // return view('user.nfc-card.create', compact('nfc_fields','client','postCount'));
        return view('user.nfc-card.edit', compact('categories', 'nfc_fields', 'client', 'postCount'));
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
        $client = Client::find(currentUserId());
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        $postCount = Post::where('client_id', currentUserId())->count();
        $countries = Country::get();
        return view('user.nfc-card.show', compact('nfc_card', 'client', 'postCount', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find(currentUserId());
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        $nfc_info = NfcInformation::find($id);
        $postCount = Post::where('client_id', currentUserId())->count();
        $categories = [
            '1' => 'Most Popular',
            '2' => 'Social',
            '3' => 'Communication',
            '4' => 'Payment',
            '5' => 'Video',
            '6' => 'Music',
            '7' => 'Design',
            '8' => 'Gaming',
            '9' => 'Other',
        ];
        return view('user.nfc-card.edit', compact('id', 'categories', 'nfc_card', 'nfc_info', 'client', 'postCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Start the database transaction
        // dd($request->all());
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
            $nfc_design->color = $request->display_nfc_color;
            if ($request->hasFile('logo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->logo->extension();
                $request->logo->move(
                    public_path('uploads/cards/'),
                    $imageName
                );
                $nfc_design->logo = $imageName;
            }
            $nfc_design->updated_by = currentUserId();
            $nfc_design->save();

            /* badges image update */
            if ($request->hasFile('badge_images')) {
                $badges = $request->file('badge_images');
                DB::table("nfc_card_badges")->where('nfc_card_id', encryptor('decrypt', $id))->delete();
                foreach ($badges as $key => $badge) {
                    $badgeImageName = rand(111, 999) . time() . '.' . $badge->extension();
                    $badge->move(public_path('uploads/cards/badges'), $badgeImageName);
                    DB::table("nfc_card_badges")->insert([
                        'nfc_card_id' => encryptor('decrypt', $id),
                        'badge_image' => $badgeImageName,
                    ]);
                }
            }

            /* Client Infomations Update */
            $client = Client::find(currentUserId());
            $client->fname = $request->f_name;
            $client->middle_name = $request->middle_name;
            $client->last_name = $request->l_name;
            if ($request->hasFile('profile')) {
                $profileImageName = rand(111, 999) . time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('uploads/client/'), $profileImageName);
                $client->image = $profileImageName;
            }
            $client->updated_by = currentUserId();
            $client->save();


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
            $existingPivotData = $nfc_card->nfcFields()->pluck('field_value', 'nfc_field_id')->toArray();

            // Retrieve the new data from the request
            $nfcFieldIds = $request->input('nfc_id');
            $nfcFieldUsernames = $request->input('nfc_user_name');
            $nfcFieldLabels = $request->input('nfc_label');

            if ($nfcFieldIds) {
                // Prepare the data for sync
                $nfcFieldData = [];
                foreach ($nfcFieldIds as $index => $nfcFieldId) {
                    // Assuming each nfc_id corresponds to an nfc_field_id
                    $nfcFieldData[$nfcFieldId] = [
                        'field_value' => $nfcFieldUsernames[$index],
                        'display_text' => $nfcFieldLabels[$index]
                    ];
                }

                // Synchronize the relationship, deleting any records not included in the new data
                $nfc_card->nfcFields()->sync($nfcFieldData);
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
    public function showqrurl($id, $client_id)
    {
        $client = Client::find($client_id);
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        return view('user.nfc-card.showqrurl', compact('nfc_card', 'client'));
    }
    public function downloadPdf($id, $client_id)
    {
        // Generate URL
        $client = Client::find($client_id);
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        //return view('user.nfc-card.showqrurl', compact('nfc_card', 'client'));
        $pdf = PDF::loadView('user.nfc-card.showqrurl', compact('nfc_card', 'client'));
        return $pdf->download('document.pdf');
    }
    public function save_contact($id)
    {

        $nfc_card = NfcCard::with(['client', 'nfc_info'])->findOrFail(encryptor('decrypt', $id));
        // Initialize an empty vCard string
        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        if ($nfc_card->client->fname || $nfc_card->client->middle_name || $nfc_card->client->last_name)
            $file_name = $nfc_card->client->fname . " " . $nfc_card->client->middle_name .  " " . $nfc_card->client->last_name . ".vcf";
        else
            $file_name =  'contact.vcf';

        // Initialize an empty vCard string
        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        // Loop through each NFC card and create a vCard entry for each

        $vCard .= "FN:" . $nfc_card->client->fname . "\r\n";
        $vCard .= "UID:" . uniqid() . "\r\n"; // Generate a unique identifier
        $vCard .= "N:" . $nfc_card->client->fname . " " . $nfc_card->client->middle_name .  " " . $nfc_card->client->last_name  . "\r\n";
        $vCard .= "EMAIL:" . $nfc_card->client->email . "\r\n";
        $vCard .= "TEL;TYPE=CELL:" . $nfc_card->client->contact_no . "\r\n";
        if ($nfc_card->client?->image)
            $filePath = asset('public/uploads/client/' . $nfc_card->client?->image);
        else
            $filePath =  asset('public/images/download.jpg');
        // Read image file and encode it to base64
        $imageData = base64_encode(file_get_contents($filePath));

        // Get the image file extension
        $imageExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        $vCard .= "PHOTO;TYPE=" . $imageExtension . ";ENCODING=BASE64:" . $imageData . "\r\n";
        $vCard .= "END:VCARD\r\n";


        // Set headers for vCard file
        $headers = [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $file_name . '"',
        ];

        // Return vCard as a response
        return response()->streamDownload(function () use ($vCard) {
            echo $vCard;
        }, $file_name, $headers);
    }

    public function email($id)
    {
        $client = Client::find(currentUserId());
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', currentUserId())->paginate(10);
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        return view('user.nfc-card.email_signature', compact('nfc_card', 'client', 'nfc_cards'));
    }
    public function virtual_background($id)
    {
        $client = Client::find(currentUserId());
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', currentUserId())->paginate(10);
        $nfc_card = NfcCard::findOrFail(encryptor('decrypt', $id));
        $nfc_virtual_categories = NfcVirtualBackgroundCategory::with('backgrounds')->get();
        return view('user.nfc-card.virtual_background', compact('nfc_card', 'client', 'nfc_cards', 'nfc_virtual_categories'));
    }
    public function duplicate($id)
    {
        // Start the transaction
        DB::beginTransaction();

        try {
            $originalNfcCard  = NfcCard::with(['nfc_info', 'nfcFields', 'card_design','badges'])->find(encryptor('decrypt', $id));
            $newNfcCard = $originalNfcCard->replicate();
            $newNfcCard->card_name = $originalNfcCard->card_name . " " . "copy"; // Update the cardname
            $newNfcCard->save();

            // Duplicate and update related NfcField records through the pivot table
            foreach ($originalNfcCard->nfcFields as $nfcField) {
                $newNfcCard->nfcFields()->attach($nfcField->id, [
                    'nfc_field_id' => $nfcField->pivot->nfc_field_id,
                    'field_value' => $nfcField->pivot->field_value,
                    'nfc_card_id' => $newNfcCard->id, // Ensure the new nfccard_id is set in the pivot table
                ]);
            }

            // Duplicate and update related NfcInformation records

                $newNfcInformation = $originalNfcCard->nfc_info->replicate();
                $newNfcInformation->nfc_card_id = $newNfcCard->id; // Update the foreign key
                $newNfcInformation->save();
           

            // Duplicate and update related NfcField records through the pivot table
            foreach ($originalNfcCard->nfcFields as $nfcField) {
                $newNfcCard->nfcFields()->attach($nfcField->id, [
                    'nfc_field_id' => $nfcField->pivot->nfc_field_id,
                    'field_value' => $nfcField->pivot->field_value,
                    'nfc_card_id' => $newNfcCard->id, // Ensure the new nfccard_id is set in the pivot table
                ]);
            }

            // Duplicate and update related Nfc Card Design records
            $nfcCardDesign = $originalNfcCard->card_design->replicate();
            $nfcCardDesign->nfc_card_id = $newNfcCard->id; // Update the foreign key
            $nfcCardDesign->save();
            

            // Commit the transaction
            DB::commit();

            $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', currentUserId())->paginate(10);
            $client = Client::find(currentUserId());
            return view('user.nfc-card.index', compact('nfc_cards', 'client'));
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            return response()->json(['message' => 'Error duplicating record: ' . $e->getMessage()], 500);
        }
    }
}
