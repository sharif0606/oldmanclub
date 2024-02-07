<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcField;
use App\Models\Backend\NfcDesign;
use App\Models\Backend\NfcInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NfcCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfc_cards = NfcCard::all();
        return view('user.nfc-card.index', compact('nfc_cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.nfc-card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                $nfc_info->created_by = currentUserId();
                $nfc_info->save();

                /* Insert Data To Nfc Design */
                $nfc_design = new NfcDesign;
                $nfc_design->nfc_card_id = $nfc->id;
                $nfc_design->design_card_id = $request->design_card_id;
                $nfc_design->created_by = currentUserId();
                $nfc_design->save();

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
    public function edit(NfcCard $nfcCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NfcCard $nfcCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NfcCard $nfcCard)
    {
        //
    }
}
