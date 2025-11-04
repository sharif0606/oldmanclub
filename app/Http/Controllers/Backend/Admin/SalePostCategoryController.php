<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\SalePostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SalePostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SalePostCategory::all();
        return view('backend.sale_post_category.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sale_post_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $salePostCategory = SalePostCategory::create($request->all());
        return redirect()->route('sale-post-category.index')->with('success', 'Sale post category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salePostCategory = SalePostCategory::find(encryptor('decrypt',$id));
        return view('backend.sale_post_category.show', compact('salePostCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $salePostCategory = SalePostCategory::find(encryptor('decrypt',$id));
        return view('backend.sale_post_category.edit', compact('salePostCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salePostCategory = SalePostCategory::find(encryptor('decrypt',$id));
        $salePostCategory->update($request->all());
        return redirect()->route('sale-post-category.index')->with('success', 'Sale post category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salePostCategory = SalePostCategory::find(encryptor('decrypt',$id));
        $salePostCategory->delete();
        return redirect()->route('sale-post-category.index')->with('success', 'Sale post category deleted successfully');
    }
}
