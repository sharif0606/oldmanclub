<?php

namespace App\Http\Controllers\User;

use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\User\Country;
use App\Models\User\City;
use App\Models\User\State;
use App\Models\Backend\PhoneBook;
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
        $post = Post::where('client_id',currentUserId())->orderBy('created_at', 'desc')->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.clientDashboard', compact('client','post','postCount'));
    }
    public function myProfile()
    {
        $client = Client::find(currentUserId());
        $post = Post::where('client_id',currentUserId())->orderBy('created_at', 'desc')->get();
        return view('user.myProfile', compact('client','post'));
    }
    public function myProfileAbout()
    {
        $client = Client::find(currentUserId());
        return view('user.myProfileAbout', compact('client'));
    }
    public function accountSetting()
    {
        $client = Client::find(currentUserId());
        $countries = Country::get();
        return view('user.accountSetting', compact('client','countries'));
    }
    // public function phonebook_list()
    // {
    //     $phonebook = PhoneBook::where('client_id',currentUserId())->find();
    //     return view('user.clientDashboard', compact('phonebook'));
    // }

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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {

    }


    public function save_profile(Request $request)
    {
        try {
            $user=Client::find(currentUserId());
            $user->fname = $request->fname;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->dob = $request->dob;
            $user->contact_no = $request->contact_no;
            $user->email = $request->email;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->current_country_id = $request->current_country_id;
            $user->current_city_id = $request->current_city_id;
            $user->current_state_id = $request->current_state_id;
            //$user->current_zip_code = $request->current_zip_code;
            $user->from_country_id = $request->from_country_id;
            $user->from_city_id = $request->from_city_id;
            $user->from_state_id = $request->from_state_id;
            //$user->from_zip_code = $request->from_zip_code;
            $user->zip_code = $request->zip_code;
            $user->nationality = $request->nationality;
            $user->id_no = $request->id_no;
            $user->id_no_type = $request->id_no_type;
            $user->marital_status = $request->marital_status;
            $user->designation = $request->designation;
            $user->profile_overview = $request->profile_overview;
            $user->tagline = $request->tagline;
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
