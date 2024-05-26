<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\PostReaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostReactionController extends Controller
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
        /*$request->validate([
            'post_id' => 'required|exists:posts,id',
            'reaction_type' => 'required|in:like,dislike',
        ]);*/
        // Check if the user has already reacted to the comment
        $existingReaction = PostReaction::where('post_id', $request->post_id)
            ->where('client_id', currentUserId())
            ->first();
        $post_reaction = new PostReaction();
        $post_reaction->post_id = $request->post_id;
        $post_reaction->client_id = currentUserId();
        $post_reaction->type = $request->reaction_type;
        $post_reaction->save();

        $value = Post::find($request->post_id);
        $reactions = PostReaction::where('post_id',$request->post_id)->orderBy('created_at', 'desc')->limit(8)->get();
        $clients = [];
        foreach ($reactions as $reaction) {
            $clients[] = $reaction->client->fname." ".$reaction->client->middle_name." ".$reaction->client->last_name; 
        }
        $clientNames = implode(',<br> ', $clients);
        // Get updated like count for the comment
        $likeCount = PostReaction::where('post_id', $request->post_id)
            ->where('type', 'like')
            ->count();
            return response()->json([
                'postHtml' => view('user.partials.post-reaction', compact('post_reaction','likeCount','value','clientNames'))->render(),
            ], 201);
        //return response()->json(['likeCount' => $likeCount], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostReaction $postReaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostReaction $postReaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostReaction $postReaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostReaction $postReaction)
    {
        //
    }

    public function post_reaction_update(Request $request)
    {
        // Validate the incoming request
        /*$request->validate([
            'post_id' => 'required|exists:posts,id',
            'reaction_type' => 'required|in:like,love,care,haha,wow,sad,angry',
        ]);*/

        // Find the post reaction to update
        $post_reaction = PostReaction::findOrFail($request->reactionId);
        $post_reaction->post_id = $request->post_id;
        $post_reaction->client_id = currentUserId();
        $post_reaction->type = $request->reaction_type;
        $post_reaction->updated_at = Carbon::now();
        $post_reaction->save();

        $value = Post::find($request->post_id);
        $reactions = PostReaction::where('post_id', $request->post_id)->orderBy('created_at', 'desc')->limit(8)->get();
        $clients = [];
        foreach ($reactions as $reaction) {
            $clients[] = $reaction->client->fname . " " . $reaction->client->middle_name . " " . $reaction->client->last_name;
        }
        $clientNames = implode(',<br> ', $clients);
        // Get updated like count for the comment
        $likeCount = PostReaction::where('post_id', $request->post_id)
            ->where('type', 'like')
            ->count();
        return response()->json([
            'postHtml' => view('user.partials.post-reaction', compact('post_reaction', 'likeCount', 'value', 'clientNames'))->render(),
        ], 201);
    }
}
