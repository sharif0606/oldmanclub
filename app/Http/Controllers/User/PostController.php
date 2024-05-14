<?php

namespace App\Http\Controllers\User;

use App\Models\User\Post;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
            'client_id' => currentUserId(),
            'privacy_mode' => $request->privacy_mode
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
        $post = Post::findOrFail($id);
        if($request->input('message')){
            $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
            $post->message = $content;
        }
        $post->privacy_mode = $request->privacy_mode;
        $post->save();

        //return response()->json(['success' => true, 'message' => 'Post updated successfully']);
        // Return a JSON response with the updated post ID and privacy mode
        return response()->json([
            'postId' => $post->id,
            'privacyMode' => $request->privacy_mode,
            'message' => 'Privacy mode updated successfully'
        ]);
    }
    public function post_update(Request $request){
        $postId = $request->postId;
        $post = Post::findOrFail($postId);
    
        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/post'), $imageName);
            $post->image = $imageName;
        }
    
        // Normalize line breaks before updating the content
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
        $post->message = $content;
        $post->updated_at = Carbon::now();
        $post->privacy_mode = $request->privacy_mode;
        $post->save();
    
        return response()->json($post);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
    }
}
