<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Client;
use App\Models\User\ClientMeta;
use App\Models\ClientCategory;
use App\Models\ClientEducation;
use App\Models\User\Comment;
use App\Models\User\Post;
use App\Models\User\PostFile;
use App\Models\User\Country;
use App\Models\User\Follow;
use App\Models\Backend\NfcCard;
use App\Message;
use App\Group;
use App\Http\Controllers\Api\BaseController;
use App\Http\Helpers\SanitizationHelper;
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
        $client = Client::with('metas')->find(Auth::user()->id);
        $followers = Follow::where('following_id', Auth::user()->id)->orderBy('id', 'desc')->take(4)->get();
        $post = Post::where('client_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return $this->sendResponse([
            'client' => $client,
            'followers' => $followers,
            'post' => $post
        ], 'Client Dashboard');
        //return view('user.myProfileAbout', compact('post', 'client', 'followers'));
    }
    public function myProfile($limit = 20)
    {
        $client = Client::with('metas','currentcountry','currentstate','fromcountry','fromstate','fromcity','currentcity')->find(Auth::user()->id);
        $followers = Follow::where('following_id', Auth::user()->id)->count();
        $following = Follow::where('follower_id', Auth::user()->id)->count();
        $latest_eight_followers = Follow::with('follower_client')->where('following_id', Auth::user()->id)->orderBy('id', 'desc')->take(8)->get();
        $post = Post::with('files','client','latestComment','singleReaction','multipleReactionCounts','shared_post')->orderBy('created_at', 'desc')->where('client_id', Auth::user()->id)->paginate($limit);
        $photos = Post::where('client_id', Auth::user()->id)
            ->where('post_type', 'image')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
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
            'following' => $following,
            'photos' => $photos,
            'online_active_users' => $online_active_users,
            'online_birthday_users' => $online_birthday_users,
            'latest_eight_followers' => $latest_eight_followers
        ], 'Profile Details');
        //return view('user.myProfile', compact('client', 'post'));
    }
    public function userProfile($id,$limit = 20)
    {
        $client = Client::with(
                    'metas',
                                'currentcountry',
                                'currentstate',
                                'fromcountry',
                                'fromstate',
                                'fromcity',
                                'currentcity',
                                'categories:id,name',
                                'educations:id,client_id,institution,field_of_study,degree,start_date,end_date,description,status',
                                'works:id,client_id,company_name,position,start_date,end_date,description,status')->find($id);
        $followers = Follow::where('following_id', $id)->count();
        $following = Follow::where('follower_id', $id)->count();
        $latest_eight_followers = Follow::with('follower_client')->where('following_id', $id)->orderBy('id', 'desc')->take(8)->get();
        $post = Post::with('files','client','latestComment','singleReaction','multipleReactionCounts','shared_post')->orderBy('created_at', 'desc')->where('client_id', $id)->paginate($limit);
        $allpostphoto = Post::where('client_id', $id)->pluck('id')->toArray();
        $isfollowed = Follow::where('follower_id', Auth::user()->id)->where('following_id', $id)->count();
        $photos = PostFile::whereIn('post_id', $allpostphoto)
            ->where('file_type', 'image')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->pluck('file_path');

        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::with('metas')->whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Get online friends whose birthday is today
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        $online_birthday_users = Client::with('metas')->whereIn('id', $friend_list)
            ->whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today]) // Birthday check
            ->get();

        return $this->sendResponse([
            'client' => $client,
            'post' => $post,
            'followers' => $followers,
            'following' => $following,
            'photos' => $photos,
            'isfollowed' => $isfollowed,
            'online_active_users' => $online_active_users,
            'online_brithday_users' => $online_birthday_users,
            'latest_eight_followers' => $latest_eight_followers
        ], 'Profile Details');
        //return view('user.myProfile', compact('client', 'post'));
    }
    public function userProfileByUsername($username,$limit = 20)
    {
        $id=Client::where('username',$username)->pluck('id')->first();
        
        if(!$id){
            return $this->sendError('User not found', [], 404);
        }
        $client = Client::with(
                    'metas',
                                'currentcountry',
                                'currentstate',
                                'fromcountry',
                                'fromstate',
                                'fromcity',
                                'currentcity',
                                'categories:id,name',
                                'educations:id,client_id,institution,field_of_study,degree,start_date,end_date,description,status',
                                'works:id,client_id,company_name,position,start_date,end_date,description,status')->find($id);
        $followers = Follow::where('following_id', $id)->count();
        $following = Follow::where('follower_id', $id)->count();
        $latest_eight_followers = Follow::with('follower_client')->where('following_id', $id)->orderBy('id', 'desc')->take(8)->get();
        $post = Post::with('files','client','latestComment','singleReaction','multipleReactionCounts','shared_post')->orderBy('created_at', 'desc')->where('client_id', $id)->paginate($limit);
        $allpostphoto = Post::where('client_id', $id)->pluck('id')->toArray();
        $isfollowed = Follow::where('follower_id', Auth::user()->id)->where('following_id', $id)->count();
        $photos = PostFile::whereIn('post_id', $allpostphoto)
            ->where('file_type', 'image')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->pluck('file_path');

        // Get the Friend List  of the current user
        $friend_list = Follow::where('following_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->pluck('follower_id'); // Extract only the `follower_id`

        // Get the list of online users from the followers
        $online_active_users = Client::with('metas')->whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Get online friends whose birthday is today
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        $online_birthday_users = Client::with('metas')->whereIn('id', $friend_list)
            ->whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today]) // Birthday check
            ->get();

        return $this->sendResponse([
            'client' => $client,
            'post' => $post,
            'followers' => $followers,
            'following' => $following,
            'photos' => $photos,
            'isfollowed' => $isfollowed,
            'online_active_users' => $online_active_users,
            'online_brithday_users' => $online_birthday_users,
            'latest_eight_followers' => $latest_eight_followers
        ], 'Profile Details');
        //return view('user.myProfile', compact('client', 'post'));
    }
    public function AdvanceSearchProfile(Request $request,$limit = 20)
    {
        $followIds = Follow::where('follower_id', Auth::user()->id)->pluck('following_id')->toArray();
        $client = Client::with('metas');

        if($request->blood_group){
            $client->where('is_blood_donor', true)->where('blood_group', $request->blood_group)->where('current_state_id', Auth::user()->current_state_id);
            
            // If current_city_id is not null, also filter by city
            if(Auth::user()->current_city_id){
                $client->where('current_city_id', Auth::user()->current_city_id);
            }
        }
        if($request->city_id){
            $client->where('current_city_id', $request->city_id);
        }
        if($request->country_id){
            $client->where('current_country_id', $request->country_id);
        }
        if($request->state_id){
            $client->where('current_state_id', $request->state_id);
        }
        if($request->community){
            $client->where(function($query) use ($request){
                $query->where('nationality', Auth::user()->nationality)
                    ->orWhere('designation', $request->designation);
            });
        }

        if($request->school && $request->school == 'yes'){
            // Get all institutions that the logged-in user has attended
            $userInstitutions = Auth::user()->educations()->pluck('institution')->toArray();
            
            if(!empty($userInstitutions)){
                $client->where(function($query) use ($userInstitutions){
                    $query->whereHas('educations', function($query) use ($userInstitutions){
                        $query->whereIn('institution', $userInstitutions);
                    });
                });
            }
        }
        if($request->singles){
            $client->where('is_single', true)->where('is_spouse_need', true)->where('current_state_id', Auth::user()->current_state_id);
            if(Auth::user()->current_city_id){
                $client->where('current_city_id', Auth::user()->current_city_id);
            }
        }
        $client = $client->paginate($limit)->map(function ($client) use ($followIds) {
            $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
            
            // Get followers for this specific client
            $clientFollowers = Follow::with('follower_client:id,fname,last_name,display_name,middle_name')
                ->where('following_id', $client->id)
                ->take(4)
                ->get()
                ->map(function($follow) {
                    return [
                        'id' => $follow->follower_client->id,
                        'fname' => $follow->follower_client->fname,
                        'lname' => $follow->follower_client->last_name,
                        'middle_name' => $follow->follower_client->middle_name,
                        'displayName' => $follow->follower_client->display_name
                    ];
                });
            
            $client->followers = $clientFollowers;
            
            return $client;
        });

        return $this->sendResponse([
            'search_results' => $client
        ], 'Advanced Search Results');
    }

    public function replyComment(Request $request)
    {
        $comment = Comment::with('client_comment','replies','singleReaction')->find($request->comment_id);
        return $this->sendResponse(['comment' => $comment], 'Reply Comment');
    }
    
    public function myNfc()
    {
        $client = Client::with('metas')->find(Auth::user()->id);
        $nfc_cards = NfcCard::with(['client', 'card_design', 'nfcFields','nfc_info'])->where('client_id', Auth::user()->id)->paginate(10);
        //return view('user.myNfc', compact('client','nfc_cards'));
        // Get the Friend List  of the current user
        

        return $this->sendResponse([
            'nfc_cards' => $nfc_cards,
            'client' => $client,
        ], 'Profile Details');
    }
    
    public function all_followers($limit = 20)
    {
        $followIds = Follow::where('following_id', Auth::user()->id)->pluck('follower_id')->toArray();
        $followers = Follow::with('follower_client')->where('following_id', '=', Auth::user()->id)
                        ->paginate($limit)->map(function ($client) use ($followIds) {
                            $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                            return $client;
                        });
        return $this->sendResponse(['followers' => $followers], 'All Followers');
    }
    public function all_following($limit = 20)
    {
        $followIds = Follow::where('follower_id', Auth::user()->id)->pluck('following_id')->toArray();
        $followers = Follow::with('follower_client')->where('follower_id', '=', Auth::user()->id)
                    ->paginate($limit)->map(function ($client) use ($followIds) {
                            $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                            return $client;
                        });
        return $this->sendResponse(['followers' => $followers], 'All Following');
    }
    public function all_followers_user($id,$limit = 20)
    {
        $followIds = Follow::where('following_id', $id)->pluck('follower_id')->toArray();
        $followers = Follow::with('follower_client')->where('following_id', '=', $id)
                    ->paginate($limit)->map(function ($client) use ($followIds) {
                            $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                            return $client;
                        });
        return $this->sendResponse(['followers' => $followers], 'All Followers');
    }
    public function all_following_user($id,$limit = 20)
    {
        $followIds = Follow::where('follower_id', $id)->pluck('following_id')->toArray();
        $followers = Follow::with('follower_client')->where('follower_id', '=', $id)
                        ->paginate($limit)->map(function ($client) use ($followIds) {
                            $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                            return $client;
                        });
        return $this->sendResponse(['followers' => $followers], 'All Following');
    }
    public function accountSetting()
    {
        $client = Client::with('metas')->find(Auth::user()->id);
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
        $client = Client::with('metas')->find($loggedInUser);
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
        $online_active_users = Client::with('metas')->whereIn('id', $friend_list)
            ->where('is_online', true) // Check if the user is online
            ->get();

        // Birthday
        $today = Carbon::today()->format('m-d'); // Extracts month and day
        // Get online friends whose birthday is today
        $online_birthday_users = Client::with('metas')->whereIn('id', $friend_list)
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
        $value = Post::with('singleReaction','client','files','comments','reactions') // You can load the client details with the post
            ->find($id);

        return $this->sendResponse([
            'value' => $value
        ], 'Single Post');
        //return view('user.includes.single-post', compact('value', 'client', 'followers', 'online_active_users', 'online_birthday_users', 'top_trending_posts'));
    }
    
    public function save_profile(Request $request)
    {
        try {
            $user = Client::with('metas')->find(Auth::user()->id);
            
            // Sanitize username and check availability
            $sanitizedUsername = SanitizationHelper::sanitizeUsername($request->username);
            if ($sanitizedUsername && $sanitizedUsername !== $user->username) {
                $count = Client::where('username', $sanitizedUsername)->count();
                if ($count > 0) {
                    return response()->json([
                        'status' => false,
                        'message' => 'The requested (' . $sanitizedUsername . ') username is not available. Please choose a different one.',
                    ], 400);
                }
            }
            
            // Sanitize all input fields
            $user->username = $sanitizedUsername;
            $user->fname = SanitizationHelper::sanitizeString($request->fname, 100);
            $user->middle_name = SanitizationHelper::sanitizeString($request->middle_name, 100);
            $user->last_name = SanitizationHelper::sanitizeString($request->last_name, 100);
            $user->display_name = SanitizationHelper::sanitizeString($request->display_name, 100);
            $user->dob = SanitizationHelper::sanitizeDate($request->dob);
            $user->phone_code = SanitizationHelper::sanitizeString($request->phone_code, 10);
            $user->contact_no = SanitizationHelper::sanitizePhoneNumber($request->contact_no);
            $user->email = SanitizationHelper::sanitizeEmail($request->email);
            $user->address_line_1 = SanitizationHelper::sanitizeString($request->address_line_1, 255);
            $user->address_line_2 = SanitizationHelper::sanitizeString($request->address_line_2, 255);
            $user->current_country_id = SanitizationHelper::sanitizeInteger($request->current_country_id, 1);
            $user->current_state_id = SanitizationHelper::sanitizeInteger($request->current_state_id, 1);
            $user->is_blood_donor = SanitizationHelper::sanitizeBoolean($request->is_blood_donor);
            $user->blood_group = SanitizationHelper::sanitizeString($request->blood_group, 10);
            $user->gender = SanitizationHelper::sanitizeString($request->gender, 20);
            $user->from_country_id = SanitizationHelper::sanitizeInteger($request->from_country_id, 1);
            $user->from_city_id = SanitizationHelper::sanitizeInteger($request->from_city_id, 1);
            $user->from_state_id = SanitizationHelper::sanitizeInteger($request->from_state_id, 1);
            $user->zip_code = SanitizationHelper::sanitizeString($request->zip_code, 20);
            $user->nationality = SanitizationHelper::sanitizeString($request->nationality, 100);
            $user->id_no = SanitizationHelper::sanitizeString($request->id_no, 50);
            $user->id_no_type = SanitizationHelper::sanitizeString($request->id_no_type, 50);
            $user->marital_status = SanitizationHelper::sanitizeString($request->marital_status, 20);
            $user->is_spouse_need = SanitizationHelper::sanitizeBoolean($request->is_spouse_need);
            $user->designation = SanitizationHelper::sanitizeString($request->designation, 100);
            $user->profile_visibility = SanitizationHelper::sanitizeProfileVisibility($request->profile_visibility);
          
            if ($user->save()) {

                
                /*
                [{'institution':'gg','field_of_study':'bd','degree':'kk','start_date':'2025-10-13','end_date':'2025-10-13','description':'','status':'0'},{'institution':'ggderg','field_of_study':'btd','degree':'kck','start_date':'2025-10-13','end_date':'2025-10-13','description':'','status':'1'}]
                */
               

                if($request->has('metas')){
                    $sanitizedMetas = SanitizationHelper::sanitizeMetaData(
                        SanitizationHelper::sanitizeJson($request->metas)
                    );
                    
                    foreach($sanitizedMetas as $meta){
                        ClientMeta::updateOrCreate([
                            'meta_key' => $meta['meta_key'],
                            'client_id' => $user->id
                        ],[
                            'meta_value' => $meta['meta_value'],
                            'meta_status' => $meta['meta_status']
                        ]);
                    }
                }

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
            $user = Client::with('metas')->find(Auth::user()->id);
            $monthfolder = date('Y-m');
            $folder = public_path('uploads/client/' . $monthfolder);
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            if ($request->hasFile('cover_photo')) {
                $imageName = rand(111, 999) . time() . '.' . $request->cover_photo->extension();
                $request->cover_photo->move($folder, $imageName);
                $user->cover_photo = $monthfolder . '/' . $imageName;
            }   
            if ($request->hasFile('image')) {
                $imageName = rand(1111, 9999) . time() . '.' . $request->image->extension();
                $request->image->move($folder, $imageName);
                $user->image = $monthfolder . '/' . $imageName;
            }
            $user->profile_overview = SanitizationHelper::sanitizeString($request->profile_overview, 1000);
            $user->tagline = SanitizationHelper::sanitizeString($request->tagline, 255);
            
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
            $data = Client::with('metas')->find(Auth::user()->id);
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
        $followIds = Follow::where('follower_id', Auth::user()->id)->pluck('following_id')->toArray();
        $search_by_people = SanitizationHelper::sanitizeSearchQuery($request->search);
        if ($search_by_people) {
            $follow_connections = Client::with('followers','metas')
            ->select('id','fname','middle_name','last_name','username','display_name','designation','image')
            ->where(function ($query) use ($search_by_people) {
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
                ->get()
                ->map(function ($client) use ($followIds) {
                    $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                    return $client;
                });
        } else {
            $follow_connections = Client::with('followers','metas')
                ->select('id','fname','middle_name','last_name','username','display_name','designation','image')
                ->where('id', '!=', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
                ->map(function ($client) use ($followIds) {
                    $client->followed = in_array($client->id, $followIds) ? 'followed' : 'not_followed';
                    return $client;
                });
        }

        return $this->sendResponse([
            'follow_connections' => $follow_connections
        ], 'Search by People');
    }
    public function client_by_search($username)
    {
        $sanitizedUsername = SanitizationHelper::sanitizeUsername($username);
        if (!$sanitizedUsername) {
            return $this->sendError('Invalid username provided', [], 400);
        }
        
        $client = Client::with('metas')->where('username', $sanitizedUsername)->first();
        if (!$client) {
            return $this->sendError('User not found', [], 404);
        }
        
        $post = Post::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();
        $postCount = Post::where('client_id', Auth::user()->id)->count();
        $followers = Follow::where('following_id', $client->id)->orderBy('id', 'desc')->take(4)->get();
        $connection = Client::with('metas')->where('username', $sanitizedUsername)->first();
        $followIds = Follow::where('following_id', Auth::user()->id)->pluck('follower_id')->toArray();

        // Get the list of online users from the followers
        $online_active_users = Client::with('metas')->whereIn('id', $followIds)
            ->where('is_online', true) // Check if the user is online
            ->where('id', '!=', $client->id)
            ->get();
            
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

    public function random_people(Request $request,$limit = 10)
    {
        $followIds = Follow::where('follower_id', Auth::user()->id)->pluck('following_id')->toArray();
       
        $follow_connections = Client::with('metas')->select('id','fname','middle_name','last_name','username','display_name','designation','image','is_online' ,'dob','status')
                                ->where('id', '!=', Auth::user()->id)
                                ->whereNotIn('id', $followIds)
                                ->paginate($limit);
        
        return $this->sendResponse([
            'follow_connections' => $follow_connections
        ], 'Search by People');
    }
    public function mentioned_people(Request $request,$limit = 10)
    {
        $sanitizedSearch = SanitizationHelper::sanitizeSearchQuery($request->search);
        
        $follow_connections = Client::select('id','fname','middle_name','last_name','username','display_name','image')
                                ->where('id', '!=', Auth::user()->id)
                                ->when($sanitizedSearch, function ($query) use ($sanitizedSearch) {
                                    $query->where('fname', 'like', "%{$sanitizedSearch}%")
                                        ->orWhere('middle_name', 'like', "%{$sanitizedSearch}%")
                                        ->orWhere('last_name', 'like', "%{$sanitizedSearch}%");
                                })
                                ->paginate($limit);
        
        return $this->sendResponse([
            'follow_connections' => $follow_connections
        ], 'Search by People');
    }

}