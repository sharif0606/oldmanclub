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
        try{
            // validate data
        $request->validate([
            'message' => 'required',
            'file' => 'mimes:png,jpg,jpeg,gif|max:5000'
        ]);
         // create db entry
         $post = Post::create([
            'message' => $request->message,
            'client_id' => currentUserId()
        ]);
        if($request->hasFile('image')){
            $imageName = rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/post'), $imageName);
            $post->image=$imageName;
        }
      

        
            if($post->save()){
                $this->notice::success('Your Post Successfully created');
                return redirect()->route('clientdashboard');
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
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
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail
    }
}
