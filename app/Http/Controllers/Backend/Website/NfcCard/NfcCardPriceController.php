<?php

namespace App\Http\Controllers\Backend\Website\NfcCard;

use App\Models\Backend\Website\NfcCard\NfcCardPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NfcCardPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfccardprice = NfcCardPrice::get();
        return view('backend.website.nfccardprice.index',compact('nfccardprice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.nfccardprice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nfccardprice = new NfcCardPrice;
            $nfccardprice->nfc_card_name = $request->nfc_card_name;
            $nfccardprice->card_price = $request->card_price;
            $nfccardprice->card_title = $request->card_title;
            $cardfeatureList = explode(',', $request->card_feature_list);
            $nfccardprice->card_feature_list = $cardfeatureList;
            $nfccardprice->payment_type = $request->payment_type;

            if($nfccardprice->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('nfccardprice.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcCardPrice $nfcCardPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nfccardprice = NfcCardPrice::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.nfccardprice.edit',compact('nfccardprice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $nfccardprice = NfcCardPrice::findOrFail(encryptor('decrypt',$id));
            $nfccardprice->nfc_card_name = $request->nfc_card_name;
            $nfccardprice->card_price = $request->card_price;
            $nfccardprice->card_title = $request->card_title;
            $cardfeatureList = explode(',', $request->card_feature_list);
            $nfccardprice->card_feature_list = $cardfeatureList;
            $nfccardprice->payment_type = $request->payment_type;

            if($nfccardprice->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('nfccardprice.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nfccardprice = NfcCardPrice::findOrFail(encryptor('decrypt',$id));
        if($nfccardprice->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('nfccardprice.index');
        }
    }
}
