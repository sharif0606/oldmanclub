<?php

namespace App\Http\Controllers\User;

use App\Models\User\AddressVerification;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AddressVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // DB::beginTransaction();
            /*$address_verify = new AddressVerification;
            $address_verify->client_id = currentUserId();
            if ($request->hasFile('id_image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->id_image->extension();
                $request->id_image->move(public_path('uploads/verify_image'), $imageName);
                $address_verify->id_image = $imageName;
            }
            if ($request->hasFile('document')) {
                $documentNames = []; // Array to store document file names
                
                foreach ($request->file('document') as $file) {
                    $validator = Validator::make(['document' => $file], [
                        'document' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx|max:2048'
                    ]);

                    if ($validator->fails()) {
                        throw new \Exception('Invalid file format or size');
                    }
                    
                    $imageName = rand(111, 999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/verify_image'), $imageName);
                    $documentNames[] = $imageName;
                }
                $address_verify->document = implode(',', $documentNames);
            }*/
            // Update the address_line_1 directly in the clients table
            $client = Client::where('id', currentUserId())->firstOrFail();
            $client->address_line_1 = $request->address_line_1;
            $client->verification_request_status = 1;
            $client->save();

            //if ($address_verify->save()) {
                return redirect()->back()->with('success', 'Data Saved'); 
           // }
           
        }catch(Exception $e){
            DB::rollback();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressVerification $addressVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddressVerification $addressVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddressVerification $addressVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressVerification $addressVerification)
    {
        //
    }
}
