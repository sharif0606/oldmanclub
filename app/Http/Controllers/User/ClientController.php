<?php

namespace App\Http\Controllers\User;

use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\User\Country;
use App\Models\User\City;
use App\Models\User\State;
use App\Models\Backend\PhoneBook;
use App\Models\User\Follow;
use App\Models\Backend\NfcCard;
use App\Message;
use App\Group;
use Pusher\Pusher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        /*session()->forget('username');
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
            },
            'shares' => function ($query) {
                // Include any additional constraints or orderings if needed
            }
        ])
        ->where('client_id', currentUserId())
        ->withoutTrashed() // Exclude soft-deleted posts
        ->orderBy('created_at', 'desc')
        ->get();

        $followers = Follow::where('following_id',currentUserId())->orderBy('id', 'desc')->take(4)->get();
        //dd($post);
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.clientDashboard', compact('client','post','postCount','followers'));*/
        session()->forget('username');
        $client = Client::find(currentUserId());
        $followers = Follow::where('following_id', currentUserId())->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', currentUserId())->orderBy('created_at', 'desc')->get();
        return view('user.myProfileAbout', compact('post', 'client', 'followers'));
    }
    public function myProfile()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $post = Post::where('client_id', currentUserId())->orderBy('created_at', 'desc')->get();
        return view('user.myProfile', compact('client', 'post'));
    }
    public function myProfileAbout()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $followers = Follow::where('following_id', currentUserId())->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', currentUserId())->orderBy('created_at', 'desc')->get();
        $photos = Post::where('client_id', currentUserId())
            ->where('post_type', 'image')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->pluck('image');

        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', currentUserId())
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        return view('user.myProfileAbout', compact('post', 'client', 'followers', 'photos', 'online_active_users'));
    }
    public function myNfc()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', currentUserId())->paginate(10);
        //return view('user.myNfc', compact('client','nfc_cards'));
        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', currentUserId())
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();
        return view('user.nfc-card.index', compact('nfc_cards', 'client', 'online_active_users'));
    }
    public function all_followers()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $followers = Follow::with('client')->where('following_id', '=', currentUserId())->get();
        return view('user.all-followers', compact('client', 'followers'));
    }
    public function accountSetting()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $countries = Country::get();
        return view('user.accountSetting', compact('client', 'countries'));
    }
    public function gathering()
    {
        session()->forget('username');
        $client = Client::find(currentUserId());
        $post = Post::where('privacy_mode', 'public')->orderBy('id', 'desc')->get();
        $followers = Follow::where('following_id', currentUserId())->orderBy('id', 'desc')->take(4)->get();
        $client = Client::find(currentUserId());
        $followers = Follow::where('following_id', currentUserId())->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', currentUserId())->orderBy('created_at', 'desc')->get();

        /*=== Chat ==== */
        //Show Contact list, Recent Chat User List and Group list
        $collection = Client::orderBy('fname')->where('id', '!=', currentUserId())
            ->get()
            ->unique(function ($item) {
                return strtolower(trim($item->fname));
            });
        $contacts = $collection->groupBy(function ($item, $key) {
            return substr(Str::lower($item->fname), 0, 1);
        });
        // Recent Chat Users -> Last send Messages users Display in first
        $users = DB::select("SELECT chatdata.*,clients.id,clients.fname,clients.image from (SELECT t1.*, CASE WHEN t1.from_user != " . currentUserId() . " THEN t1.from_user ELSE t1.to_user END AS userid , (SELECT SUM(is_read=0) as unread FROM `messages` WHERE messages.to_user=" . currentUserId() . " AND messages.from_user=userid GROUP BY messages.from_user) as unread
        FROM messages AS t1
        INNER JOIN
        (
            SELECT
                LEAST(`from_user`, `to_user`) AS sender_id,
                GREATEST(`from_user`, `to_user`) AS receiver_id,
                MAX(id) AS max_id
            FROM messages
            GROUP BY
                LEAST(sender_id, receiver_id),
                GREATEST(sender_id, receiver_id)
        ) AS t2
            ON LEAST(t1.`from_user`, t1.`to_user`) = t2.sender_id AND
            GREATEST(t1.`from_user`, t1.`to_user`) = t2.receiver_id AND
            t1.id = t2.max_id
            WHERE t1.`from_user` = " . currentUserId() . " OR t1.`to_user` =" . currentUserId() . ") chatdata JOIN clients On clients.id=userid  WHERE clients.id !=" . currentUserId() . " ORDER BY chatdata.id DESC");
        $user_id = currentUserId();

        $AttachedFiles = Message::where(function ($query) use ($user_id) {
            $query->where('from_user', $user_id)->orWhere('to_user', $user_id);
        })->whereNotNull('file')->get();

        //Show Groups List only added users
        $user_id = currentUserId();
        $groupdata = Group::with(['users' => function ($qq) use ($user_id) {
            $qq->select('group_id', 'is_read')->where('user_id', $user_id);
        }])->whereHas('groupUsers', function ($qr) use ($user_id) {
            $qr->where('user_id', '=', $user_id);
        })->get();


        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', currentUserId())
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();
        return view('user.includes.gathering', compact('client', 'post', 'followers', 'users', 'contacts', 'groupdata', 'AttachedFiles', 'online_active_users'));
    }
    // public function phonebook_list()
    // {
    //     $phonebook = PhoneBook::where('client_id',currentUserId())->find();
    //     return view('user.clientDashboard', compact('phonebook'));
    // }
    public function singlePost()
    {
        $client = Client::find(currentUserId());
        return view('user.includes.single-post', compact('client'));
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
        dd($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client) {}


    public function save_profile(Request $request)
    {
        //dd($request);
        try {
            $user = Client::find(currentUserId());
            $count = Client::where('username', $request->username)->count();
            if ($count > 0  && $request->username !== $user->username) {
                return redirect()->back()->withInput()->withErrors(['username' => 'The requested (' . $request->username . ') username is not available. Please choose a different one.']);
            }
            $user->username = $request->username;
            $user->fname = $request->fname;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->display_name = $request->display_name;
            $user->dob = $request->dob;
            $user->phone_code = $request->phone_code;
            $user->contact_no = $request->contact_no;
            $user->email = $request->email;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->current_country_id = $request->current_country_id;
            $user->current_state_id = $request->current_state_id;
            //$user->current_city_id = $request->current_city_id;
            //$user->current_zip_code = $request->current_zip_code;
            $user->from_country_id = $request->from_country_id;
            $user->from_city_id = $request->from_city_id;
            $user->from_state_id = $request->from_state_id;
            //$user->from_zip_code = $request->from_zip_code;
            $user->zip_code = $request->zip_code;
            $user->nationality = $request->nationality;
            $user->phone_code = $request->phone_code;
            $user->id_no = $request->id_no;
            $user->id_no_type = $request->id_no_type;
            $user->marital_status = $request->marital_status;
            $user->designation = $request->designation;
            /*if ($request->hasFile('cover_photo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cover_photo->extension();
                $request->cover_photo->move(public_path('uploads/client'), $imageName);
                $user->cover_photo = $imageName;
            }
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/client'), $imageName);
                $user->image = $imageName;
            }*/
            if ($user->save()) {
                $this->setSession($user);
                $this->notice::success('Save Changes Successfully');
                return redirect()->back()->withInput(['tab' => 'nav-setting-tab-1']);
            }
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }
    public function save_cover_profile_photo(Request $request)
    {
        try {
            $user = Client::find(currentUserId());
            if ($request->hasFile('cover_photo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cover_photo->extension();
                $request->cover_photo->move(public_path('uploads/client'), $imageName);
                $user->cover_photo = $imageName;
                $post = Post::create([
                    'message' => "Changed Cover Photo",
                    'image' => $imageName,
                    'client_id' => currentUserId(),
                    'post_type' => 'profile_photo'
                ]);
            }
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/client'), $imageName);
                $user->image = $imageName;
                $post = Post::create([
                    'message' => "Changed Profile Photo",
                    'image' => $imageName,
                    'client_id' => currentUserId(),
                    'post_type' => 'cover_photo'
                ]);
            }
            $user->profile_overview = $request->profile_overview;
            $user->tagline = $request->tagline;
            if ($user->save()) {
                $this->setSession($user);
                $this->notice::success('Data Saved');
                return redirect()->back()->withInput(['tab' => 'nav-setting-tab-2']);
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
            if (!Hash::check($request->current_password, $data->password)) {
                $this->notice::error('Current Password is incorrect');
                return redirect()->back();
            }
            $data->password = Hash::make($request->password);
            if ($data->save()) {
                $this->setSession($data);
                $this->notice::success('Data Saved');
                return redirect()->back()->withInput(['tab' => 'nav-setting-tab-4']);;
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
    public function search_by_people(Request $request)
    {
        //dd(currentUserId());
        $client = Client::with('followers')->find(currentUserId());

        // Retrieve all follow IDs from the followers
        // Enable query logging
        DB::connection()->enableQueryLog();
        $followIds = Follow::where('following_id', currentUserId())->pluck('follower_id')->toArray();
        // Get the executed queries
        $queries = DB::getQueryLog();

        // Print the queries
        /*foreach ($queries as $query) {
            dump($query);
        }*/
        $search_by_people = trim($request->search);
        if ($request->search) {
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
        } else {
            $follow_connections = Client::where('id', '!=', currentUserId())
                ->whereNotIn('id', $followIds)
                ->orderBy('id', 'desc')->get();
        }

        $unfollow_connections = Follow::with('client')->where('following_id', '=', currentUserId())->get();

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
        return view('user.searchByPeople', compact('client', 'follow_connections', 'unfollow_connections', 'followIds', 'search_client_id'));
    }
    public function client_by_search($username)
    {
        session()->forget('username');
        // Store the username in the session
        Session::put('username', $username);
        //dd($username);
        $client = Client::where('username', $username)->first();
        $post = Post::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        $followers = Follow::where('following_id', $client->id)->orderBy('id', 'desc')->take(4)->get();
        $connection = Client::where('username', $username)->first();
        $followIds = Follow::where('following_id', currentUserId())->pluck('follower_id')->toArray();


        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $followIds)
            ->where('is_online', true) // Check if the user is online
            ->where('id', '!=', $client->id)
            ->get();
        //dd($followIds);
        return view('connection.connectionDashboard', compact('client', 'post', 'postCount', 'followers', 'followIds', 'connection', 'online_active_users'));
    }
    public function usernameProfile($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        $post = Post::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();
        return view('user.myProfile', compact('client', 'post'));
    }
    public function usernameProfileAbout($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        return view('user.myProfileAbout', compact('client'));
    }
}
