<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\User\Comment;
use App\Models\User\CommentReaction;
use App\Models\User\Reply;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
class CommentController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     */
    public function reaction_save(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate(['comment_id' => 'required|exists:comments,id']);
            // Check if the user has already reacted to the comment
            $existingReaction = CommentReaction::where('comment_id', $request->comment_id)
                ->where('client_id', Auth::user()->id)
                ->first();
            if ($existingReaction) {
                $comment_reaction = $existingReaction;
                $comment_reaction->updated_at = Carbon::now();
            }else{
                $comment_reaction = new CommentReaction();
                $comment_reaction->comment_id = $request->comment_id;
                $comment_reaction->client_id = Auth::user()->id;
            }
            $comment_reaction->type = $request->reaction_type;
            $comment_reaction->save();
            $comment = Comment::find($request->comment_id);

            // Get updated like count for the comment
            $likeCount = CommentReaction::where('comment_id', $request->comment_id)
                /*->where('type', 'like')*/
                ->count();
            return $this->sendResponse([
                'comment' => $comment,
                'likeCount' => $likeCount
            ], 'Comment Reaction Saved');
        } catch (Exception $e) {
            if($e){
                return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
            }else{
                return $this->sendError('Unauthorised.', ['error'=>'An error occurred']);
            }
        }
    }

    public function store(Request $request)
    {
        try{
            $comment = new Comment();
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->client_id = Auth::user()->id;
            // Save the comment
            $comment->save();

            // Return the newly created comment as a JSON response
            return $this->sendResponse([
                'comment' => $comment
            ], 'Comment Added Successfully');

        } catch (Exception $e) {
            if($e){
                return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
            }else{
                return $this->sendError('Unauthorised.', ['error'=>'An error occurred']);
            }
        }
    }

    public function replay(Request $request)
    {
        try{
            $reply = New Reply();
            $reply->comment_id = $request->comment_id;
            $reply->parent_id = $request->parent_id;
            $reply->content = $request->content;
            $reply->client_id = Auth::user()->id;
            // Save the comment
            $reply->save();
            $comment = Comment::find($request->comment_id);
            return response()->json([
                'reply' => $reply,
                'comment' => $comment
            ], 201);
        }catch(Exception $e){
            
        }
    }
}
