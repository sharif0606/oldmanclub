<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Models\User\Client;
use App\Group;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Pusher\Pusher;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        $groupdata = Group::with(['users' => function($qq) use($user_id){
            $qq->select('group_id', 'is_read')->where('user_id', $user_id);
        }])->whereHas('groupUsers', function($qr) use($user_id){
            $qr->where('user_id', '=', $user_id);
        })->get();
        $client = Client::find(currentUserId());
        //return view('chat.index')->with(['client' => $client,'users' => $users, 'contacts' => $contacts, 'groupdata' => $groupdata, 'AttachedFiles' => $AttachedFiles]);

        return view('user.messaging',compact('client'))->with(['client' => $client,'users' => $users, 'contacts' => $contacts, 'groupdata' => $groupdata, 'AttachedFiles' => $AttachedFiles]);
    }

    public function getMessage($user_id)
    {
        $my_id = currentUserId();
        // Make read all unread
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->get();
        // Get Receiver user Detail
        $chatUser = Client::find($user_id);
        $client = Client::find($my_id);
        return [
            'view1' => view('chat.layouts.chat-message-data')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->with(['client' => $client])->render(),
            'view2' => view('chat.layouts.user-profile-details')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->with(['client' => $client])->render()
        ];
    }

    public function getLastMessage($user_id)
    {
        $my_id = currentUserId();
        // Make read all unread message
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->orderBy('id', 'DESC')->limit(1)->get();

        $chatUser = Client::find($user_id);
        $client = Client::find($my_id);
        return view('chat.layouts.message-conversation')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->with(['client' => $client]);
    }

    // Send Messages using pusher
    public function sendMessage(Request $request)
    {
        $from = currentUserId();
        $to = $request->receiver_id;
        $message = $request->message;
        $file = $request->file;

        $data = new Message();
        $data->from_user = $from;
        $data->to_user = $to;
        $data->message = $message;
        if ($file != Null) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filepath = public_path('Upload/');
            $file->move($filepath, $filename);
            $data->file = 'Upload/' . $filename;
        }
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from_user' => $from, 'to_user' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return $data;
    }

    // File size convert bytes to mb,gb,...
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }

    // Delete only selected message
    public function deleteMessage($id)
    {
        Message::where('id', $id)->delete();
    }

    // Delete selected users All messages(Conversation)
    public function deleteConversation($user_id)
    {
        $my_id = currentUserId();
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->delete();
    }

    // Send Typing using Pusher
    public function sendTyping(Request $request)
    {
        $from = currentUserId();
        $to = $request->receiver_id;
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from_user' => $from, 'to_user' => $to, 'typing' => true]; // showing typing notification when a user is typing a message
        $pusher->trigger('my-channel', 'my-event', $data);
    }



    // USER DASHBOARD CHAT
    public function getSingleMessageDashboard($user_id)
    {
        $my_id = currentUserId();
        // Make read all unread
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->get();
        // Get Receiver user Detail
        $chatUser = Client::find($user_id);
        $client = Client::find($my_id);
        return [
            'view1' => view('chat.layouts.chat-message-data')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->with(['client' => $client])->render()
        ];
    }
}
