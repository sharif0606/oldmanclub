<?php

namespace App\Http\Controllers\User;

use App\Models\User\Share;
use App\Models\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ShareController extends Controller
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
        // Start a database transaction
        DB::beginTransaction();
        try {
            $share = New Share;
            $share->post_id = $request->post_id;
            $share->client_id = currentUserId();
            $share->save();
            if ($share){
                // Retrieve the post you want to share
                $sharedPost = Post::find($request->post_id);
                $newPost = new Post;
                $newPost->message = $sharedPost->message;
                $newPost->image = $sharedPost->image;
                $newPost->client_id = currentUserId();
                $newPost->shared_from = $sharedPost->client_id;
                $newPost->post_type = 'shared_post';
                $newPost->save();
                // Commit the transaction if everything succeeds
                DB::commit();
                $this->notice::success('Post Shared Successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();
            //dd($e->getMessage()); // Example: Display the error message
            $this->notice::error('Something went wrong!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Share $share)
    {
        //
    }
}
