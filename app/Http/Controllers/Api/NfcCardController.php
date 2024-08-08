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
        $data = NfcCard::where('client_id',$id)->get();
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
        $data = NfcCard::where('client_id',$id)->first();
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
