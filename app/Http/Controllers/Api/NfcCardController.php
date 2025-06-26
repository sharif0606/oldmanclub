<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Models\Backend\NfcCard;
use App\Http\Controllers\Api\BaseController;

class NfcCardController extends BaseController
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
    // public function show($id)
    // {
    //     $data = NfcCard::findorFail(encryptor('decrypt', $id));
    //     $data = [
    //         "card_name" => $data->card_name,
    //         "card_type" => $data->card_type,
    //         "image" => $data->client->image ? asset('uploads/client/') . "/" . $data->client->image : '',
    //         "client" => "",
    //         "nfc_info" => "",
    //         "nfcFields" => "",
    //         "badges" => "",
    //     ];
    //     if ($data)
    //         return response(array("status_code" => 200, "data" => $data));
    //     else
    //         return response(array("message" => "No data found", "status_code" => 202, "data" => array()));
    // }


    public function show($id)
    {
        $nfc_card = NfcCard::with(['client', 'card_design', 'nfcFields','nfc_info'])->where('id', $id)->first();
        return $this->sendResponse(['nfc_card' => $nfc_card], 'Nfc card fetched successfully');
    }

    public function save_contact($id)
    {
        $nfc_card = NfcCard::with(['client', 'nfc_info'])->where('id', $id)->first();
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
}
