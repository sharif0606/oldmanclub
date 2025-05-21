<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Http\Controllers\Controller;
use App\Models\Backend\NfcVirtualBackgroundCategory;
use Illuminate\Http\Request;

class NfcVirtualBackgroundCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NfcVirtualBackgroundCategory::all();
        return view('backend.nfc.virtual_background_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.nfc.virtual_background_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $nfc_virtual_background_category = NfcVirtualBackgroundCategory::create($request->all());
        return redirect()->route('nfc-virtual-background-category.index')->with('success', 'Nfc virtual background category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $nfc_virtual_background_category = NfcVirtualBackgroundCategory::find(encryptor('decrypt',$id));
        return view('backend.nfc.virtual_background_category.show', compact('nfcVirtualBackgroundCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = NfcVirtualBackgroundCategory::find(encryptor('decrypt',$id));
        return view('backend.nfc.virtual_background_category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nfc_virtual_background_category = NfcVirtualBackgroundCategory::find(encryptor('decrypt',$id));
        $nfc_virtual_background_category->update($request->all());
        return redirect()->route('nfc-virtual-background-category.index')->with('success', 'Nfc virtual background category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $nfc_virtual_background_category = NfcVirtualBackgroundCategory::find(encryptor('decrypt',$id));
        $nfc_virtual_background_category->delete();
        return redirect()->route('nfc-virtual-background-category.index')->with('success', 'Nfc virtual background category deleted successfully');
    }
}
