<?php

namespace App\Http\Controllers\Backend\Nfc;

use App\Models\NfcCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NfcCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.nfc.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcCard $nfcCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NfcCard $nfcCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NfcCard $nfcCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NfcCard $nfcCard)
    {
        //
    }
}
