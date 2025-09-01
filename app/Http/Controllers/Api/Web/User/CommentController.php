<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\User\Comment;
use App\Models\User\CommentReaction;
use App\Models\User\Reply;
use App\Models\User\ReplyReaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\CommentFileUploadService;
use App\Services\ReplayFileUploadService;
use Exception;
class CommentController extends BaseController
{
    protected $commentFileUploadService;
    protected $replyFileUploadService;

    public function __construct(CommentFileUploadService $commentFileUploadService, ReplayFileUploadService $replyFileUploadService)
    {
        $this->commentFileUploadService = $commentFileUploadService;
        $this->replyFileUploadService = $replyFileUploadService;
    }

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
            $content = strip_tags(preg_replace('/\R{2,}/', "\n", $request->input('content')));
            $comment = new Comment();
            $comment->post_id = $request->post_id;
            $comment->content = $content;
            $comment->client_id = Auth::user()->id;
            // Save the comment
            $comment->save();
            // Handle multiple files if present
            if($comment && $request->hasFile('files')) {
                $files = $request->file('files');
                
                foreach ($files as $file) {
                    try {
                        $this->commentFileUploadService->uploadCommentFile($file, $comment->id);
                    } catch (Exception $e) {
                        // Log error and continue with other files
                        \Log::error('File upload failed: ' . $e->getMessage());
                    }
                }
            }

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
            if($request->parent_id!="null"){
                $reply->parent_id = $request->parent_id;
            }
            $content = strip_tags(preg_replace('/\R{2,}/', "\n", $request->input('content')));
            $reply->content = $content;
            $reply->client_id = Auth::user()->id;
            // Save the comment
            $reply->save();
            if($reply && $request->hasFile('files')) {
                $files = $request->file('files');
                
                foreach ($files as $file) {
                    try {
                        $this->replyFileUploadService->uploadReplayFile($file, $reply->id);
                    } catch (Exception $e) {
                        // Log error and continue with other files
                        \Log::error('File upload failed: ' . $e->getMessage());
                    }
                }
            }
            $comment = Comment::find($request->comment_id);
            return response()->json([
                'reply' => $reply,
                'comment' => $comment
            ], 201);
        }catch(Exception $e){
            if($e){
                return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
            }else{
                return $this->sendError('Unauthorised.', ['error'=>'An error occurred']);
            }
        }
    }

    public function replay_reaction(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate(['reply_id' => 'required|exists:replies,id']);
            // Check if the user has already reacted to the comment
            $existingReaction = ReplyReaction::where('reply_id', $request->reply_id)
                                ->where('client_id', Auth::user()->id)
                                ->first();
            if ($existingReaction) {
                $reply_reaction = $existingReaction;
                $reply_reaction->updated_at = Carbon::now();
            }else{
                $reply_reaction = new ReplyReaction();
                $reply_reaction->reply_id = $request->reply_id;
                $reply_reaction->client_id = Auth::user()->id;
            }
            $reply_reaction->type = $request->type;
            $reply_reaction->save();
            $reply = Reply::find($request->reply_id);

            // Get updated like count for the comment
            $likeCount = ReplyReaction::where('reply_id', $request->reply_id)
                /*->where('type', 'like')*/
                ->count();
            return $this->sendResponse([
                'reply' => $reply,
                'likeCount' => $likeCount
            ], 'Reply Reaction Saved');
        } catch (Exception $e) {
            if($e){
                return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
            }else{
                return $this->sendError('Unauthorised.', ['error'=>'An error occurred']);
            }
        }
    }

    public function replay_reaction_delete(Request $request)
    {
        try {
            $request->validate(['reply_id' => 'required|exists:replies,id']);
            $existingReaction = ReplyReaction::where('reply_id', $request->reply_id)
            ->where('client_id', Auth::user()->id)
            ->first();
            if($existingReaction){
                $existingReaction->delete();
            }
            return $this->sendResponse([], 'Reply Reaction Deleted');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
        }
    }

    public function comment_reaction_delete(Request $request)
    {
        try {
            $request->validate(['comment_id' => 'required|exists:comments,id']);
            $existingReaction = CommentReaction::where('comment_id', $request->comment_id)
            ->where('client_id', Auth::user()->id)
            ->first();
            if($existingReaction){
                $existingReaction->delete();
            }
            return $this->sendResponse([], 'Comment Reaction Deleted');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error'=>$e->getMessage()]);
        }
    }
}
