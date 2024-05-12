<?php

namespace App\Http\Controllers\User;

use App\Models\User\Post;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $post = Post::where('client_id',currentUserId())->orderBy('created_at', 'desc')->get();
        // return view('user.clientDashboard', compact('post'));
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
     
        if($request->hasFile('image')){
            $imageName = rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/post'), $imageName);
        }else{
            $imageName = '';
        }
        // Normalize line breaks before storing the content
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
         // create db entry
         $post = Post::create([
            'message' => $content,
            'image'=>$imageName,
            'client_id' => currentUserId()
        ]);
        
        return response()->json($post);
         
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($postId)
    {
        // Fetch the post data from the database
        $post = Post::findOrFail($postId);

        // Return the post data as JSON response
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
        $post = Post::findOrFail($id);
        $post->message = $content;
        $post->save();

        return response()->json(['success' => true, 'message' => 'Post updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
    }
}
