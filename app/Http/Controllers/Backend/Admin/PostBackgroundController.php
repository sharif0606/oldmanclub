<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostBackground;
use App\Models\PostBackgroundCategory;
use Illuminate\Http\Request;

class PostBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PostBackground::all();
        return view('backend.post_background.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostBackgroundCategory::all();
        return view('backend.post_background.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = new PostBackground();
            $folder = date('Y-m');
            $path = public_path('uploads/post_background/' . $folder);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move($path, $imageName);
                $data->image = $folder . '/' . $imageName;
            }
            $data->category_id = $request->category_id;
            $data->save();
            return redirect()->route('post-background.index')->with('success', 'Post background created successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('post-background.index')->with('error', 'Post background creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostBackground $postBackground)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = PostBackground::find(encryptor('decrypt',$id));
        $categories = PostBackgroundCategory::all();
        return view('backend.post_background.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = PostBackground::find(encryptor('decrypt',$id));
        if ($request->hasFile('image')) {
            if ($data->image) {
                if (file_exists(public_path('uploads/post_background/' . $data->image))) {
                    unlink(public_path('uploads/post_background/' . $data->image));
                }
            }
            $folder = date('Y-m');
            $path = public_path('uploads/post_background/' . $folder);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $data->image = $folder . '/' . $imageName;
        }
        $data->category_id = $request->category_id;
        $data->save();
        return redirect()->route('post-background.index')->with('success', 'Post background updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = PostBackground::find(encryptor('decrypt',$id));
        if ($data->image) {
            unlink(public_path('uploads/post_background/' . $data->image));
        }
        $data->delete();
        return redirect()->route('post-background.index')->with('success', 'Post background deleted successfully');
    }
}
