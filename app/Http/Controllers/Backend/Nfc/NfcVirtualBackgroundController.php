<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Http\Controllers\Controller;
use App\Models\Backend\NfcVirtualBackground;
use App\Models\Backend\NfcVirtualBackgroundCategory;
use Illuminate\Http\Request;

class NfcVirtualBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NfcVirtualBackground::all();
        return view('backend.nfc.virtual_background.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = NfcVirtualBackgroundCategory::all();
        return view('backend.nfc.virtual_background.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = new NfcVirtualBackground();
            $folder = date('Y-m');
            $path = public_path('uploads/nfc_virtual_background/' . $folder);
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
            return redirect()->route('nfc-virtual-background.index')->with('success', 'Nfc virtual background created successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('nfc-virtual-background.index')->with('error', 'Nfc virtual background creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcVirtualBackground $nfcVirtualBackground)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = NfcVirtualBackground::find(encryptor('decrypt',$id));
        $categories = NfcVirtualBackgroundCategory::all();
        return view('backend.nfc.virtual_background.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = NfcVirtualBackground::find(encryptor('decrypt',$id));
        if ($request->hasFile('image')) {
            if ($data->image) {
                if (file_exists(public_path('uploads/nfc_virtual_background/' . $data->image))) {
                    unlink(public_path('uploads/nfc_virtual_background/' . $data->image));
                }
            }
            $folder = date('Y-m');
            $path = public_path('uploads/nfc_virtual_background/' . $folder);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $data->image = $folder . '/' . $imageName;
        }
        $data->category_id = $request->category_id;
        $data->save();
        return redirect()->route('nfc-virtual-background.index')->with('success', 'Nfc virtual background updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = NfcVirtualBackground::find(encryptor('decrypt',$id));
        if ($data->image) {
            unlink(public_path('uploads/nfc_virtual_background/' . $data->image));
        }
        $data->delete();
        return redirect()->route('nfc-virtual-background.index')->with('success', 'Nfc virtual background deleted successfully');
    }
}
