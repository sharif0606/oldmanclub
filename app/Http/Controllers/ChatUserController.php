<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User\Client;
use App\Message;

class ChatUserController extends Controller
{
    // Update user Avatar
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validation->passes()) {
            $avataruloaded = $request->file('file');
            $avatarname = time() . '.' . $avataruloaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruloaded->move($avatarpath, $avatarname);

            $my_id = currentUserId();
            $user = Client::find($my_id);
            if (file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }
            $user->avatar = '/images/' . $avatarname;
            $user->update();

            $response = [
                "success" => 1,
                "data" => 'images/' . $avatarname
            ];
        } else {
            $response = [
                "success" => 0,
                "data" => 'Not Uploaded'
            ];
        }
        return json_encode($response);
    }

    // Update user Name
    public function nameupdate(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255']
        ]);
        if ($validation->passes()) {
            $my_id = currentUserId();
            $user = Client::find($my_id);
            $user->name = $request->name;
            $user->save();
            $response = [
                "success" => 1,
                "data" => $user->name
            ];
        } else {
            $response = [
                "success" => 0,
                "data" => 'Not Valid name'
            ];
        }
        return json_encode($response);
    }

    // Delete Selected Contact 
    public function destroy($id)
    {
        $users = Client::findOrFail($id);
        $users->delete();

        $collection = Client::orderBy('fname')->get();
        $contacts = $collection->groupBy(function ($item, $key) {
            return substr($item->name, 0, 1);
        });
        $htmldata = view('chat.layouts.tabpane-contact-list')->with('contacts', $contacts)->render();
        return Response($htmldata);
    }

    // Search Contact
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $datas = Client::with('metas')->where('fname', 'LIKE', '%' . $request->search . "%")->orderBy('fname')->get();
            $contacts = $datas->groupBy(function ($item, $key) {
                return substr($item->name, 0, 1);
            });
            $htmldata = view('chat.layouts.tabpane-contact-list')->with('contacts', $contacts)->render();
            return Response($htmldata);
        }
    }

    // Search Recent chat Userlist
    public function recentsearch(Request $request)
    {
        if ($request->ajax()) {

            $users = DB::select("SELECT chatdata.*,clients.id,clients.display_name,clients.image from (SELECT t1.*, CASE WHEN t1.from_user != " . currentUserId() . " THEN t1.from_user ELSE t1.to_user END AS userid , (SELECT SUM(is_read=0) as unread FROM `messages` WHERE messages.to_user=" . currentUserId() . " AND messages.from_user=userid GROUP BY messages.from_user) as unread
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
                    WHERE t1.`from_user` = " . currentUserId() . " OR t1.`to_user` =" . currentUserId() . ") chatdata JOIN clients On clients.id=userid  and clients.fname LIKE '%" . $request->search . "%' ORDER BY chatdata.id DESC");

            $htmldata = view('chat.chat.layouts.tabpane-recent-contact-list')->with('users', $users)->render();
            return Response($htmldata);
        }
    }

    // Search Selected user chat messages
    public function messagesearch(Request $request)
    {
        if ($request->ajax()) {
            $my_id = currentUserId();
            $user_id = $request->userid;
            $serachquery = $request->search;

            $messages = Message::where(function ($query) use ($user_id, $my_id, $serachquery) {
                $query->where('from_user', $user_id)->where('to_user', $my_id)->where('message', 'LIKE', '%' . $serachquery . "%");
            })->oRwhere(function ($query) use ($user_id, $my_id, $serachquery) {
                $query->where('from_user', $my_id)->where('to_user', $user_id)->where('message', 'LIKE', '%' . $serachquery . "%");
            })->get();

            $chatUser = Client::find($user_id);

            $htmldata = view('chat.layouts.message-conversation')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->render();
            return Response($htmldata);
        }
    }

    // Get messages for a conversation
    public function getMessages($userId)
    {
        $my_id = currentUserId();
        $messages = Message::where(function ($query) use ($userId, $my_id) {
            $query->where('from_user', $userId)->where('to_user', $my_id);
        })->oRwhere(function ($query) use ($userId, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $userId);
        })->get();

        return response()->json([
            'messages' => $messages
        ]);
    }

    // Send a new message
    public function sendMessage(Request $request)
    {
        $from_user = currentUserId();
        $to_user = $request->chatId; // This should match your frontend chatId
        $message = $request->content;

        $data = new Message();
        $data->from_user = $from_user;
        $data->to_user = $to_user;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        // Trigger Pusher event
        $options = [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('private-chat.' . $to_user, 'MessageSent', [
            'message' => $data
        ]);

        return response()->json([
            'message' => $data
        ]);
    }

     // Handle typing indicator
     public function typing(Request $request)
     {
         $options = [
             'cluster' => env('PUSHER_APP_CLUSTER'),
             'useTLS' => true
         ];
 
         $pusher = new Pusher(
             env('PUSHER_APP_KEY'),
             env('PUSHER_APP_SECRET'),
             env('PUSHER_APP_ID'),
             $options
         );
 
         $pusher->trigger('private-chat.' . $request->conversation_id, 'typing', [
             'user' => [
                 'id' => currentUserId()
             ]
         ]);
 
         return response()->json(['success' => true]);
     }
}
