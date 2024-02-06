<?php

namespace App\Http\Controllers;

use App\Models\Backend\NfcField;
use Illuminate\Http\Request;

class NfcFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=NfcField::paginate(10);
        return view('backend.nfc-field.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.nfc-field.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcField $nfcField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NfcField $nfcField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NfcField $nfcField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NfcField $nfcField)
    {
        //
    }
}
