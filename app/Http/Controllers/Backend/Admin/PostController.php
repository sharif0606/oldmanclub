<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Client;
use App\Models\User\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_list(){
        $post = Post::get();
        return view('backend.post.list',compact('post'));
    }
}
