<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostBackgroundCategory;
use Illuminate\Http\Request;

class PostBackgroundCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PostBackgroundCategory::all();
        return view('backend.post_background_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.post_background_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $post_background_category = PostBackgroundCategory::create($request->all());
        return redirect()->route('post-background-category.index')->with('success', 'Post background category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $post_background_category = PostBackgroundCategory::find(encryptor('decrypt',$id));
        return view('backend.backend.post_background_category.show', compact('postBackgroundCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = PostBackgroundCategory::find(encryptor('decrypt',$id));
        return view('backend.post_background_category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post_background_category = PostBackgroundCategory::find(encryptor('decrypt',$id));
        $post_background_category->update($request->all());
        return redirect()->route('post-background-category.index')->with('success', 'Post background category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $post_background_category = PostBackgroundCategory::find(encryptor('decrypt',$id));
        $post_background_category->delete();
        return redirect()->route('post-background-category.index')->with('success', 'Post background category deleted successfully');
    }
}
