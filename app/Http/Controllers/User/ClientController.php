<?php

namespace App\Http\Controllers\User;

use App\Models\User\Client;
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
        $client = Client::find(currentUserId());
        return view('user.clientDashboard', compact('client'));
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
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
    public function save_profile(Request $request)
    {
        try {
            $user=Client::find(currentUserId());
            $user->first_name_en = $request->first_name_en;
            $user->middle_name_en = $request->middle_name_en;
            $user->last_name_en = $request->last_name_en;
            $user->date_of_birth = $request->date_of_birth;
            $user->contact_en = $request->contact_en;
            $user->email = $request->email;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip_code = $request->zip_code;
            $user->nationality = $request->nationality;
            $user->id_no = $request->id_no;
            $user->id_no_type = $request->id_no_type;
            if ($request->hasFile('cover_photo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cover_photo->extension();
                $request->cover_photo->move(public_path('uploads/client'), $imageName);
                $user->cover_photo = $imageName;
            }
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/client'), $imageName);
                $user->image = $imageName;
            }
            if ($user->save()){
                $this->setSession($user);
                return redirect()->back()->with('success', 'Data Saved');
            }
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }
    public function change_password(Request $request)
    {
        try {
            $data = Client::find(currentUserId());
            //validate current password
            if(!Hash::check($request->current_password, $data->password)){
                $this->notice::error('Current Password is incorrect');
                return redirect()->back();
            }
            $data->password = Hash::make($request->password);
            if ($data->save()) {
                $this->setSession($data);
                $this->notice::success('Data Saved');
                return redirect()->back()->with('success', 'Data Saved');
            } 
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }
    public function setSession($client)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $client->id),
                'userName' => encryptor('encrypt', $client->first_name_en),
                'emailAddress' => encryptor('encrypt', $client->email),
                'userLogin' => 1,
                'image' => $client->image ?? 'No Image Found' 
            ]
        );
    }
}
