<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\CommentReaction;
use Illuminate\Http\Request;

class CommentReactionController extends Controller
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
            'comment_id' => 'required|exists:comments,id',
            'reaction_type' => 'required|in:like,dislike',
        ]);
        // Check if the user has already reacted to the comment
        $existingReaction = CommentReaction::where('comment_id', $request->comment_id)
            ->where('client_id', currentUserId())
            ->first();
        $comment_reaction = new CommentReaction();
        $comment_reaction->comment_id = $request->comment_id;
        $comment_reaction->client_id = currentUserId();
        $comment_reaction->type = $request->reaction_type;
        $comment_reaction->save();
        // Get updated like count for the comment
        $likeCount = CommentReaction::where('comment_id', $request->comment_id)
            ->where('type', 'like')
            ->count();

        return response()->json(['likeCount' => $likeCount], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(CommentReaction $commentReaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentReaction $commentReaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentReaction $commentReaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentReaction $commentReaction)
    {
        //
    }
}
