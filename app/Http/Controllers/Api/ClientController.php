<?php

namespace App\Http\Controllers\Api;

use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields  = [
            "id",
            "fname",
            "middle_name",
            "last_name",
            "username",
            "display_name",
            "dob",
            "phone_code",
            "contact_no",
            "email",
            "address_line_1",
            "address_line_2",
            "current_country_id",
            "current_state_id",
            "current_city_id",
            "from_country_id",
            "from_state_id",
            "from_city_id",
            "zip_code",
            "nationality",
            "designation",
            "marital_status",
            "profile_overview",
            "tagline",
            "id_no",
            "id_no_type",
            "image",
            "cover_photo",
            "photo_id",
            "is_photo_verified",
            "address_proof_photo",
            "address_proof_type",
            "verification_request_status",
            "code",
            "is_address_verified",
            "is_email_verified",
            "is_contact_verified",
            "status",
        ];
        $data = Client::select($fields)->get();
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
    public function show(string $id)
    {
        //
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
