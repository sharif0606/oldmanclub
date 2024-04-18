<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
use Illuminate\Http\Request;

class PostCommnetController extends Controller
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
        // Validate the request data
        /*$validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);*/

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->client_id = currentUserId();
        // Save the comment
        $comment->save();

        // Return the newly created comment as a JSON response
        return response()->json([
            'commentHtml' => view('user.partials.comment_item', compact('comment'))->render(),
        ], 201);
        // Redirect back or to a different page
        //return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCommnet $postCommnet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCommnet $postCommnet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCommnet $postCommnet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCommnet $postCommnet)
    {
        //
    }
}
