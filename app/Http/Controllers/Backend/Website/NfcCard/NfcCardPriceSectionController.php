<?php

namespace App\Http\Controllers\Backend\Website\NfcCard;

use App\Models\Backend\Website\NfcCard\NfcCardPriceSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NfcCardPriceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfccardsection = NfcCardPriceSection::get();
        return view('backend.website.nfcpricesection.index',compact('nfccardsection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.nfcpricesection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nfccard = new NfcCardPriceSection;
            $nfccard->text_large = $request->text_large;
            $nfccard->text_small = $request->text_small;
            if($nfccard->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('nfcpricesection.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcCardPriceSection $nfcCardPriceSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nfccardsection = NfcCardPriceSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.nfcpricesection.edit',compact('nfccardsection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $nfccardsection = NfcCardPriceSection::findOrFail(encryptor('decrypt',$id));
            $nfccardsection->text_large = $request->text_large;
            $nfccardsection->text_small = $request->text_small;
            if($nfccardsection->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('nfcpricesection.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nfccardsection = NfcCardPriceSection::findOrFail(encryptor('decrypt',$id));
        if($nfccardsection->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('nfcpricesection.index');
        }
    }
}
