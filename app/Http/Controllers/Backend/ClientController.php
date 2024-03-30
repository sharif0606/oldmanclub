<?php

namespace App\Http\Controllers\Backend;

use App\Models\User\Client;
use App\Models\User\AddressVerification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::get();
        return view('backend.client.index', compact('client'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::findOrFail(encryptor('decrypt',$id));
        $client_address = AddressVerification::where('client_id',$client->id)->get();
        return view('backend.client.show', compact('client','client_address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail(encryptor('decrypt',$id));
        return view('backend.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        try{
            $client = Client::findOrFail(encryptor('decrypt',$id));
            $client->fname=$request->fname;
            $client->middle_name=$request->middle_name;
            $client->last_name=$request->last_name;
            $client->dob=$request->dob;
            $client->contact_no=$request->contact_no;
            $client->email=$request->email;
            $client->address_line_1=$request->address_line_1;
            $client->address_line_2=$request->address_line_2;
            // $client->country=$request->country;
            // $client->city=$request->city;
            // $client->state=$request->state;
            // $client->zip_code=$request->zip_code;
            $client->nationality=$request->nationality;
            $client->id_no=$request->id_no;
            $client->id_no_type=$request->id_no_type;
            $client->status=$request->status;
            if($request->password)
                $client->password=Hash::make($request->password);

            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/client'), $imageName);
                $client->image=$imageName;
            }

            if($client->save()){
                $this->notice::success('Successfully updated');
                return redirect()->route('client.index');
            }
        }catch(Exception $e){
            $this->notice::error('Please try again');
            //dd($e);
            return redirect()->back()->withInput();
        }
    }

    public function verification($id){
        $client = Client::findOrFail(encryptor('decrypt',$id));
        $client_address = AddressVerification::where('client_id',$client->id)->get();
        return view('backend.client.verify', compact('client','client_address'));
    }
    public function verification_update(Request $request, $id){
        $client = Client::findOrFail(encryptor('decrypt',$id));
        $client->is_address_verified = $request->is_address_verified;
        if($client->save()){
            $this->notice::success('Address successfully Verified');
            return redirect()->route('client.index');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client = Client::findOrFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/client/').$client->image;
        
        if($client->delete()){
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
