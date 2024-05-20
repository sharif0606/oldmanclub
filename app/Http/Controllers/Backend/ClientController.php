<?php

namespace App\Http\Controllers\Backend;

use App\Models\User\Client;
use App\Models\User\AddressVerification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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

    public function generateUniqueOTP() {
        do {
            // Generate a random 6-digit code
            $otp = Str::random(6);
    
            // Check if the code already exists in the clients table
            $existingClient = Client::where('code', $otp)->exists();
    
        } while ($existingClient);
    
        return $otp;
    }
    public function verification($id){
        $client = Client::findOrFail(encryptor('decrypt',$id));
       // $client_address = AddressVerification::where('client_id',$client->id)->get();
        $client->code = $this->generateUniqueOTP();
        $client->verification_request_status = 2;
        if($client->save()){
            $this->notice::success('Code Generated Successfully');
            return redirect()->back();
        }
        //return view('backend.client.verify', compact('client','client_address'));
    }
    public function verification_update(Request $request, $id){
        $client = Client::findOrFail(encryptor('decrypt',$id));
        if(currentUser() == 'superadmin'){

        }else{
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'code' => [
                    'required',
                    function ($attribute, $value, $fail) use ($client) {
                        // Check if the provided code matches the code field of the client
                        if ($value !== $client->code) {
                            $fail('The provided code does not match the given code.');
                        }
                    },
                ],
            ]);

            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        
        
   
        $client->is_address_verified = 1;
        if($client->save()){
            if(currentUser() == 'superadmin'){
                $this->notice::success('ID Verification Complete');
                return redirect()->route('client.index');
            }else{
                $this->notice::success('Address successfully Verified');
                redirect()->back()->withInput(['tab' => 'nav-setting-tab-3']);
            }
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
    public function secretLogin($id){
        request()->session()->flush();
        $user = Client::findorFail($id);
        if(!!$user && $this->setSession($user)){
            return redirect()->route('clientdashboard')->with('success', 'Successfully login');
        } else
        return redirect()->back()->with("error", 'Something Went Wrong!!');
    }
    public function setSession($user)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $user->id),
                'userName' => $user->username,
            ]
        );
    }
}
