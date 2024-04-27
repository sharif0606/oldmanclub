<?php

namespace App\Http\Controllers\User;

use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\User\Country;
use App\Models\User\City;
use App\Models\User\State;
use App\Models\Backend\PhoneBook;
use App\Models\User\Follow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        session()->forget('username');
        $client = Client::withCount('followers', 'followings')->find(currentUserId());
        $post = Post::with([
            'reactions' => function ($query) {
                // Filter reactions where client_id is the current user's ID or any user's ID
                $query->orderBy('created_at', 'desc');
            },
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc')->with(['replies' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }]);
            }
        ])
        ->where('client_id', currentUserId())
        ->orderBy('created_at', 'desc')
        ->get();
        $followers = Follow::where('following_id',currentUserId())->orderBy('id', 'desc')->take(4)->get();
        //dd($post);
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.clientDashboard', compact('client','post','postCount','followers'));
    }
    public function myProfile()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $post = Post::where('client_id',currentUserId())->orderBy('created_at', 'desc')->get();
        return view('user.myProfile', compact('client','post'));
    }
    public function myProfileAbout()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        return view('user.myProfileAbout', compact('client'));
    }
    public function accountSetting()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $countries = Country::get();
        return view('user.accountSetting', compact('client','countries'));
    }
    public function gathering(){
        session()->forget('username');
        $client = Client::find(currentUserId());
        $post = Post::where('client_id','!=',currentUserId())->orderBy('id', 'desc')->get();
        $followers = Follow::where('following_id',currentUserId())->orderBy('id', 'desc')->take(4)->get();
        return view('user.includes.gathering',compact('client','post','followers'));
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
        dd($client);
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
    public function search_by_people(Request $request){
        //dd(currentUserId());
        $client = Client::with('followers')->find(currentUserId());

        // Retrieve all follow IDs from the followers
        // Enable query logging
        DB::connection()->enableQueryLog();
        $followIds = Follow::where('following_id',currentUserId())->pluck('follower_id')->toArray();
        // Get the executed queries
        $queries = DB::getQueryLog();

        // Print the queries
        /*foreach ($queries as $query) {
            dump($query);
        }*/
        $search_by_people = trim($request->search);
        
        $follow_connections = Client::where(function ($query) use ($search_by_people) {
            $names = explode(' ', $search_by_people);
            foreach ($names as $name) {
                $query->where(function ($query) use ($name) {
                    $query->where('fname', 'like', "%$name%")
                          ->orWhere('middle_name', 'like', "%$name%")
                          ->orWhere('last_name', 'like', "%$name%");
                });
            }
        })
        ->where('id', '!=', currentUserId())
        ->whereNotIn('id', $followIds)
        ->get();
        $unfollow_connections = Follow::with('client')->where('following_id', '=',currentUserId())->get();

        /*$search_client_id = Client::where(function ($query) use ($search_by_people) {
            $query->where('fname', 'like', '%' . $search_by_people . '%')
            ->orWhere('middle_name', 'like', '%' . $search_by_people . '%')
            ->orWhere('last_name', 'like', '%' . $search_by_people . '%');
        })->first();*/

        $search_client_id = Client::where(function ($query) use ($search_by_people) {
            $names = explode(' ', $search_by_people);
            foreach ($names as $name) {
                $query->where(function ($query) use ($name) {
                    $query->where('fname', 'like', "%$name%")
                          ->orWhere('middle_name', 'like', "%$name%")
                          ->orWhere('last_name', 'like', "%$name%");
                });
            }
        })->first();
        return view('user.searchByPeople',compact('client','follow_connections','unfollow_connections','followIds','search_client_id'));
    }
    public function client_by_search($username)
    {
        session()->forget('username');
        // Store the username in the session
        Session::put('username', $username);
        //dd($username);
        $client = Client::where('username', $username)->first();
        $post = Post::where('client_id',$client->id)->orderBy('created_at', 'desc')->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        $followers = Follow::where('following_id',$client->id)->orderBy('id', 'desc')->take(4)->get();
        $connection = Client::where('username', $username)->first();
        $followIds = Follow::where('following_id',currentUserId())->pluck('follower_id')->toArray();
        return view('connection.connectionDashboard', compact('client','post','postCount','followers','followIds','connection'));
    }
    public function usernameProfile($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        $post = Post::where('client_id',$client->id)->orderBy('created_at', 'desc')->get();
        return view('user.myProfile', compact('client','post'));
       
    }
    public function usernameProfileAbout($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        return view('user.myProfileAbout', compact('client'));
    }
}
