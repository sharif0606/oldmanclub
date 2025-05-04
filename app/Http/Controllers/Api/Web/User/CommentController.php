<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
use App\Models\User\CommentReaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function reaction_save(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            //'reaction_type' => 'required|in:like,dislike',
        ]);
        // Check if the user has already reacted to the comment
        $existingReaction = CommentReaction::where('comment_id', $request->comment_id)
            ->where('client_id', Auth::user()->id)
            ->first();
        $comment_reaction = new CommentReaction();
        $comment_reaction->comment_id = $request->comment_id;
        $comment_reaction->client_id = Auth::user()->id;
        $comment_reaction->type = $request->reaction_type;
        $comment_reaction->save();

        $comment = Comment::find($request->comment_id);

        // Get updated like count for the comment
        $likeCount = CommentReaction::where('comment_id', $request->comment_id)
            /*->where('type', 'like')*/
            ->count();
        return response()->json([
            'comment' => $comment,
            'likeCount' => $likeCount
        ]);
    }

    
    public function reaction_update(Request $request)
    {
        // Find the post reaction to update
        $comment_reaction = CommentReaction::findOrFail($request->reactionId);
        $comment_reaction->comment_id = $request->comment_id;
        $comment_reaction->client_id = Auth::user()->id;
        $comment_reaction->type = $request->reaction_type;
        $comment_reaction->updated_at = Carbon::now();
        $comment_reaction->save();

        $comment = Comment::find($request->comment_id);

        // Get updated like count for the comment
        $likeCount = CommentReaction::where('comment_id', $request->comment_id)
            /*->where('type', 'like')*/
            ->count();

        return response()->json([
                'comment' => $comment,
                'likeCount' => $likeCount
            ]);
    }
}
