<?php

namespace App\Http\Controllers\Backend\Website\NfcCard;

use App\Models\Backend\Website\NfcCard\SubscribeSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribe = SubscribeSection::get();
        return view('backend.website.nfcsubscribe.index',compact('subscribe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.nfcsubscribe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $subscribe = new SubscribeSection;
            $subscribe->text_large = $request->text_large;
            $subscribe->text_small = $request->text_small;
            if($subscribe->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('subscribesection.index');
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
    public function show(SubscribeSection $subscribeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscribe = SubscribeSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.nfcsubscribe.edit',compact('subscribe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $subscribe = SubscribeSection::findOrFail(encryptor('decrypt',$id));
            $subscribe->text_large = $request->text_large;
            $subscribe->text_small = $request->text_small;
            if($subscribe->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('subscribesection.index');
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
        $subscribe = SubscribeSection::findOrFail(encryptor('decrypt',$id));
        if($subscribe->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('subscribesection.index');
        }
    }
}
