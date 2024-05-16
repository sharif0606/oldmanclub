<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Reply;
use App\Models\User\ReplyReaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReplyReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the incoming request data
        $request->validate([
            'reply_id' => 'required|exists:replies,id',
            //'reaction_type' => 'required|in:like,dislike',
        ]);
        // Check if the user has already reacted to the reply
        $existingReaction = ReplyReaction::where('reply_id', $request->reply_id)
            ->where('client_id', currentUserId())
            ->first();
        $reply_reaction = new ReplyReaction();
        $reply_reaction->reply_id = $request->reply_id;
        $reply_reaction->client_id = currentUserId();
        $reply_reaction->type = $request->reaction_type;
        $reply_reaction->save();


        $reply = Reply::find($request->reply_id);

        // Get updated like count for the reply
        $likeCount = ReplyReaction::where('reply_id', $request->reply_id)
            /*->where('type', 'like')*/
            ->count();

        //return response()->json(['likeCount' => $likeCount], 200);
        return response()->json([
            'postHtml' => view('user.partials.reply-reaction', compact('reply', 'likeCount'))->render(),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ReplyReaction $replyReaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReplyReaction $replyReaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReplyReaction $replyReaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReplyReaction $replyReaction)
    {
        //
    }
    public function reply_reaction_update(Request $request)
    {
        // Validate the incoming request
        /*$request->validate([
            'post_id' => 'required|exists:posts,id',
            'reaction_type' => 'required|in:like,love,care,haha,wow,sad,angry',
        ]);*/

        // Find the post reaction to update
        $reply_reaction = ReplyReaction::findOrFail($request->reactionId);
        $reply_reaction->reply_id = $request->reply_id;
        $reply_reaction->client_id = currentUserId();
        $reply_reaction->type = $request->reaction_type;
        $reply_reaction->updated_at = Carbon::now();
        $reply_reaction->save();

        $reply = Reply::find($request->reply_id);

        // Get updated like count for the reply
        $likeCount = ReplyReaction::where('reply_id', $request->reply_id)
            /*->where('type', 'like')*/
            ->count();

        //return response()->json(['likeCount' => $likeCount], 200);
        return response()->json([
            'postHtml' => view('user.partials.reply-reaction', compact('reply', 'likeCount'))->render(),
        ], 201);
    }
}
