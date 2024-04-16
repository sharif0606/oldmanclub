<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\comment;
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
        $post_comment = New Comment();
        $post_comment->post_id = $request->post_id;
        $post_comment->content = $request->content;
        $post_comment->client_id = currentUserId();
        // Save the comment
        $post_comment->save();

        // Redirect back or to a different page
        return redirect()->back()->with('success', 'Comment added successfully!');
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
