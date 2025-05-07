<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\User\Country;
use App\Models\User\Follow;
use App\Models\Backend\NfcCard;
use App\Message;
use App\Group;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $client = Client::find(Auth::user()->id);
        $followers = Follow::where('following_id', Auth::user()->id)->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return $this->sendResponse([
            'client' => $client,
            'followers' => $followers,
            'post' => $post
        ], 'Client Dashboard');
        //return view('user.myProfileAbout', compact('post', 'client', 'followers'));
    }
    public function myProfile()
    {
        $client = Client::find(Auth::user()->id);
        $post = Post::where('client_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return $this->sendResponse([
            'client' => $client,
            'post' => $post
        ], 'Profile Details');
        //return view('user.myProfile', compact('client', 'post'));
    }
    public function myProfileAbout()
    {
        $client = Client::find(Auth::user()->id);
        $followers = Follow::where('following_id', Auth::user()->id)->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $photos = Post::where('client_id', Auth::user()->id)
            ->where('post_type', 'image')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->pluck('image');

        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Get online friends whose birthday is today
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        $online_birthday_users = Client::whereIn('id', $friend_list)
            ->whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today]) // Birthday check
            ->get();

        return $this->sendResponse([
            'client' => $client,
            'post' => $post,
            'followers' => $followers,
            'photos' => $photos,
            'online_active_users' => $online_active_users,
            'online_birthday_users' => $online_birthday_users
        ], 'Profile Details');
        //return view('user.myProfileAbout', compact('post', 'client', 'followers', 'photos', 'online_active_users','online_birthday_users'));
    }
    public function myNfc()
    {
        $client = Client::find(Auth::user()->id);
        $followers = Follow::where('following_id', Auth::user()->id)->orderBy('id', 'desc')->take(4)->get();
        $post = Post::with('files','client','comments')->where('client_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields'])->where('client_id', Auth::user()->id)->paginate(10);
        //return view('user.myNfc', compact('client','nfc_cards'));
        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        return $this->sendResponse([
            'nfc_cards' => $nfc_cards,
            'client' => $client,
            'online_active_users' => $online_active_users,
            'post' => $post,
            'followers' => $followers
        ], 'Profile Details');
    }
    public function all_followers()
    {
        $client = Client::find(Auth::user()->id);
        $followers = Follow::with('client')->where('following_id', '=', Auth::user()->id)->get();
        return $this->sendResponse([
            'client' => $client,
            'followers' => $followers
        ], 'All Followers');
        //return view('user.all-followers', compact('client', 'followers'));
    }
    public function accountSetting()
    {
        $client = Client::find(Auth::user()->id);
        $countries = Country::get();
        return $this->sendResponse([
            'client' => $client,
            'countries' => $countries
        ], 'Account Setting');
        //return view('user.accountSetting', compact('client', 'countries'));
    }
    public function gathering()
    {
        $loggedInUser = Auth::user()->id;
        
        //$otherspost = Post::where('privacy_mode', 'public')->orderBy('id', 'desc')->get();
        $client = Client::find($loggedInUser);
        $followers = Follow::where('following_id', $loggedInUser)->orderBy('id', 'desc')->take(4)->get();
        

        // Recent Chat Users -> Last send Messages users Display in first
        // $users = DB::select("SELECT chatdata.*,clients.id,clients.fname,clients.image from (SELECT t1.*, CASE WHEN t1.from_user != " . $loggedInUser . " THEN t1.from_user ELSE t1.to_user END AS userid , (SELECT SUM(is_read=0) as unread FROM `messages` WHERE messages.to_user=" . $loggedInUser . " AND messages.from_user=userid GROUP BY messages.from_user) as unread
        // FROM messages AS t1
        // INNER JOIN
        // (
        //     SELECT
        //         LEAST(`from_user`, `to_user`) AS sender_id,
        //         GREATEST(`from_user`, `to_user`) AS receiver_id,
        //         MAX(id) AS max_id
        //     FROM messages
        //     GROUP BY
        //         LEAST(sender_id, receiver_id),
        //         GREATEST(sender_id, receiver_id)
        // ) AS t2
        //     ON LEAST(t1.`from_user`, t1.`to_user`) = t2.sender_id AND
        //     GREATEST(t1.`from_user`, t1.`to_user`) = t2.receiver_id AND
        //     t1.id = t2.max_id
        //     WHERE t1.`from_user` = " . $loggedInUser . " OR t1.`to_user` =" . Auth::user()->id . ") chatdata JOIN clients On clients.id=userid  WHERE clients.id !=" . $loggedInUser . " ORDER BY chatdata.id DESC");
        

        // $AttachedFiles = Message::where(function ($query) use ($loggedInUser) {
        //     $query->where('from_user', $loggedInUser)->orWhere('to_user', $loggedInUser);
        // })->whereNotNull('file')->get();

        //Show Groups List only added users
        $groupdata = Group::with(['users' => function ($qq) use ($loggedInUser) {
            $qq->select('group_id', 'is_read')->where('user_id', $loggedInUser);
        }])->whereHas('groupUsers', function ($qr) use ($loggedInUser) {
            $qr->where('user_id', '=', $loggedInUser);
        })->get();


        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', $loggedInUser)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Birthday
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        // Get online friends whose birthday is today
        $online_birthday_users = Client::whereIn('id', $friend_list)
            ->whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today]) // Birthday check
            ->get();


        $top_trending_posts = Post::withCount('reactions')
            /*where('privacy_mode', 'public')
        ->where('post_type', 'image')*/
            ->whereIn('client_id', $friend_list)
            ->orderByDesc('reactions_count')
            ->limit(5)
            ->get();
        // dd($users);
        return $this->sendResponse([
            'client' => $client,
            'followers' => $followers,
            'groupdata' => $groupdata,
            'online_active_users' => $online_active_users,
            'online_birthday_users' => $online_birthday_users,
            'top_trending_posts' => $top_trending_posts
        ], 'Gathering');
        
    }
    // public function phonebook_list()
    // {
    //     $phonebook = PhoneBook::where('client_id',currentUserId())->find();
    //     return view('user.clientDashboard', compact('phonebook'));
    // }
    public function singlePost($id)
    {
        $loggedInUser = Auth::user()->id;
        $client = Client::find($loggedInUser);
        $followers = Follow::where('following_id', $loggedInUser)->orderBy('id', 'desc')->take(4)->get();
        $value = Post::with('client','files','comments','reactions') // You can load the client details with the post
            ->findOrFail($id);

        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', $loggedInUser)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Birthday
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        // Get online friends whose birthday is today
        $online_birthday_users = Client::whereIn('id', $friend_list)
            ->whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today]) // Birthday check
            ->get();

        $top_trending_posts = Post::withCount('reactions')
            /*where('privacy_mode', 'public')
        ->where('post_type', 'image')*/
            ->whereIn('client_id', $friend_list)
            ->orderByDesc('reactions_count')
            ->limit(5)
            ->get();

        return $this->sendResponse([
            'value' => $value,
            'client' => $client,
            'followers' => $followers,
            'online_active_users' => $online_active_users,
            'online_birthday_users' => $online_birthday_users,
            'top_trending_posts' => $top_trending_posts
        ], 'Single Post');
        //return view('user.includes.single-post', compact('value', 'client', 'followers', 'online_active_users', 'online_birthday_users', 'top_trending_posts'));
    }
    
    public function save_profile(Request $request)
    {
        //dd($request);
        try {
            $user = Client::find(Auth::user()->id);
            $count = Client::where('username', $request->username)->count();
            if ($count > 0  && $request->username !== $user->username) {
                return response()->json([
                    'status' => false,
                    'message' => 'The requested (' . $request->username . ') username is not available. Please choose a different one.',
                ], 400);
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
           
            if ($user->save()) {
                $this->notice::success('Save Changes Successfully');
                return $this->sendResponse([
                    'status' => true,
                    'message' => 'Save Changes Successfully',
                    'user' => $user
                ], 'Save Changes Successfully');
            }
        } catch (Exception $e) {
            // dd($e);
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function save_cover_profile_photo(Request $request)
    {
        try {
            $user = Client::find(Auth::user()->id);
            $monthfolder = date('Y-m');
            $folder = public_path('uploads/client/' . $monthfolder);
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            if ($request->hasFile('cover_photo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cover_photo->extension();
                $request->cover_photo->move($folder, $imageName);
                $user->cover_photo = $monthfolder . '/' . $imageName;
                $post = Post::create([
                    'message' => "Changed Cover Photo",
                    'image' => $monthfolder . '/' . $imageName,
                    'client_id' => Auth::user()->id,
                    'post_type' => 'profile_photo'
                ]);
            }   
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move($folder, $imageName);
                $user->image = $monthfolder . '/' . $imageName;
                $post = Post::create([
                    'message' => "Changed Profile Photo",
                    'image' => $monthfolder . '/' . $imageName,
                    'client_id' => Auth::user()->id,
                    'post_type' => 'cover_photo'
                ]);
            }
            $user->profile_overview = $request->profile_overview;
            $user->tagline = $request->tagline;
            if ($user->save()) {
                $this->notice::success('Data Saved');
                return $this->sendResponse([
                    'status' => true,
                    'message' => 'Data Saved',
                    'user' => $user
                ], 'Data Saved');
            }
        } catch (Exception $e) {
            // dd($e);
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function change_password(Request $request)
    {
        try {
            $data = Client::find(Auth::user()->id);
            //validate current password
            if (!Hash::check($request->current_password, $data->password)) {
                $this->notice::error('Current Password is incorrect');
                return $this->sendError('Unauthorised.', [
                    'message' => 'Current Password is incorrect',
                ]);
            }
            $data->password = Hash::make($request->password);
            if ($data->save()) {
                $this->notice::success('Data Saved');
                return $this->sendResponse([
                    'status' => true,
                    'message' => 'Data Saved',
                    'user' => $data
                ], 'Data Saved');
            }
        } catch (Exception $e) {
            //dd($e);
            $this->notice::error('Please try again');
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function search_by_people(Request $request)
    {
        //dd(currentUserId());
        $client = Client::with('followers')->find(Auth::user()->id);

        // Retrieve all follow IDs from the followers
        // Enable query logging
        DB::connection()->enableQueryLog();
        $followIds = Follow::where('following_id', Auth::user()->id)->pluck('follower_id')->toArray();
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
                ->where('id', '!=', Auth::user()->id)
                ->whereNotIn('id', $followIds)
                ->get();
        } else {
            $follow_connections = Client::where('id', '!=', Auth::user()->id)
                ->whereNotIn('id', $followIds)
                ->orderBy('id', 'desc')->get();
        }

        $unfollow_connections = Follow::with('client')->where('following_id', '=', Auth::user()->id)->get();

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
        return $this->sendResponse([
            'client' => $client,
            'follow_connections' => $follow_connections,
            'unfollow_connections' => $unfollow_connections,
            'followIds' => $followIds,
            'search_client_id' => $search_client_id
        ], 'Search by People');
        //return view('user.searchByPeople', compact('client', 'follow_connections', 'unfollow_connections', 'followIds', 'search_client_id'));
    }
    public function client_by_search($username)
    {
        $client = Client::where('username', $username)->first();
        $post = Post::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();
        $postCount = Post::where('client_id', Auth::user()->id)->count();
        $followers = Follow::where('following_id', $client->id)->orderBy('id', 'desc')->take(4)->get();
        $connection = Client::where('username', $username)->first();
        $followIds = Follow::where('following_id', Auth::user()->id)->pluck('follower_id')->toArray();


        // Get the list of online users from the followers
        $online_active_users = Client::whereIn('id', $followIds)
            ->where('is_online', true) // Check if the user is online
            ->where('id', '!=', $client->id)
            ->get();
        //dd($followIds);
        return $this->sendResponse([
            'client' => $client,
            'post' => $post,
            'postCount' => $postCount,
            'followers' => $followers,
            'followIds' => $followIds,
            'connection' => $connection,
            'online_active_users' => $online_active_users
        ], 'Client Dashboard');
        //return view('connection.connectionDashboard', compact('client', 'post', 'postCount', 'followers', 'followIds', 'connection', 'online_active_users'));
    }
    public function usernameProfile($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        $post = Post::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();
        return $this->sendResponse([
            'client' => $client,
            'post' => $post
        ], 'Client Dashboard');
        //return view('user.myProfile', compact('client', 'post'));
    }
    public function usernameProfileAbout($username)
    {
        $client = Client::where('username', 'like', "%$username%")->first();
        return $this->sendResponse([
            'client' => $client
        ], 'Client Dashboard');
        //return view('user.myProfileAbout', compact('client'));
    }
}