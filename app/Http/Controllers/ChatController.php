<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewMessage;

class ChatController extends Controller
{
    public function index()
    {
        // Fetch chat messages
        $chats = Chat::with('user', 'client')->latest()->get();

        return view('chat.index', compact('chats'));
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        $chat = Chat::create([
            'message' => $request->input('message'),
            'user_id' => $request->input('user_id'),
            'client_id' => $request->input('client_id'),
        ]);

        event(new NewMessage($chat));
        broadcast(new NewMessage($chat));

        return response()->json(['status' => 'Message sent successfully']);
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
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
