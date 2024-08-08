<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Models\Backend\NfcCard;

class NfcCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $result = NfcCard::where('client_id', $id)->get();
        //dd($data);
        foreach ($result as $d) {
            //dd($d->client);
            $data[] = [
                //"id" => $d->id,
                "card_name" => $d->card_name,
                "card_type" => $d->card_type,
                "image" => $d->client->image ? asset('uploads/client/') . "/" . $d->client->image : '',
                "url" => url('/') . "/api/nfcqrurl/" . encryptor('encrypt', $d->id).'/'.$d->client_id
            ];
        }
        if ($data)
            return response(array("status_code" => 200, "data" => $data));
        else
            return response(array("message" => "No data found", "status_code" => 202, "data" => array()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = NfcCard::findorFail(encryptor('decrypt', $id));
        $data = [
            "card_name" => $data->card_name,
            "card_type" => $data->card_type,
            "image" => $data->client->image ? asset('uploads/client/') . "/" . $data->client->image : '',
            "client" => "",
            "nfc_info" => "",
            "nfcFields" => "",
            "badges" => "",
        ];
        if ($data)
            return response(array("status_code" => 200, "data" => $data));
        else
            return response(array("message" => "No data found", "status_code" => 202, "data" => array()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
