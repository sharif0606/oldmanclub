<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatEvent;
use App\Models\Chat;

class ChatController extends Controller
{
    public function adminChat()
    {
        $user= \App\Models\User\Client::get();
        $chats = Chat::where('user_id', currentUserId())
            ->orderBy('created_at', 'asc')
            ->get();
        
        return view('backend.admin_chat', compact('chats','user'));
    }

    public function adminSendMessage(Request $request)
    {
        // dd($request->all());
        
        $request->validate([
            'message' => 'required|string',
        ]);

        $user_id = currentUserId();

        $chat = Chat::create([
            'user_id' => $user_id,
            'message' => $request->input('message'),
        ]);

        event(new ChatEvent($chat));

        return redirect()->back();
    }

    public function userChat()
    {
        
        $chats = Chat::where('client_id', currentUserId())
            ->orderBy('created_at', 'asc')
            ->get();
        
        return view('user.user_chat', compact('chats'));
    }

    public function userSendMessage(Request $request)
    {
        
        $request->validate([
            'message' => 'required|string',
        ]);

        $client_id = currentUserId();

        $chat = Chat::create([
            'client_id' => $client_id,
            'message' => $request->input('message'),
        ]);

        event(new ChatEvent($chat));

        return redirect()->back();
    }
}
