<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $user = auth()->user();
        
        // Broadcast the message
        broadcast(new MessageSent($user, $request->message))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully'
        ]);
    }
} 