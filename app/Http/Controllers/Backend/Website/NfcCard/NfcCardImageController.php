<?php

namespace App\Http\Controllers\Backend\Website\NfcCard;

use App\Models\Backend\Website\NfcCard\NfcCardImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Exception;

class NfcCardImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nfccard = NfcCardImage::get();
        return view('backend.website.nfccard.index',compact('nfccard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.nfccard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $nfccard = new NfcCardImage;
            $nfccard->header_text_large = $request->header_text_large;
            $nfccard->header_text_small = $request->header_text_small;
            if($request->hasFile('header_image')){
                $imageName = rand(111,999).'.'.$request->header_image->extension();
                $request->header_image->move(public_path('uploads/nfccard'),$imageName);
                $nfccard->header_image=$imageName;
            }
            $nfccard->video_link = $request->video_link;
            $featureList = explode(',', $request->feature_list);
            $nfccard->feature_list = $featureList;
            if($request->hasFile('feature_image')){
                $imageName=rand(111,999).'.'.$request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/nfccard'),$imageName);
                $nfccard->feature_image = $imageName;
            }
            if($nfccard->save()){
                $this->notice::success('NFC Card Successfully Saved');
                return redirect()->route('nfccard.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NfcCardImage $nfcCardImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nfccard = NfcCardImage::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.nfccard.edit',compact('nfccard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $nfccard = NfcCardImage::findOrFail(encryptor('decrypt',$id));
            $nfccard->header_text_large = $request->header_text_large;
            $nfccard->header_text_small = $request->header_text_small;
            if($request->hasFile('header_image')){
                $imageName = rand(111,999).'.'.$request->header_image->extension();
                $request->header_image->move(public_path('uploads/nfccard'),$imageName);
                $nfccard->header_image=$imageName;
            }
            $nfccard->video_link = $request->video_link;
            $featureList = explode(',', $request->feature_list);
            $nfccard->feature_list = $featureList;
            if($request->hasFile('feature_image')){
                $imageName=rand(111,999).'.'.$request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/nfccard'),$imageName);
                $nfccard->feature_image = $imageName;
            }
            if($nfccard->save()){
                $this->notice::success('NFC Card Successfully Saved');
                return redirect()->route('nfccard.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nfccard = NfcCardImage::findOrFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/nfccard/').$nfccard->image;
        
        if($nfccard->delete()){
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }

    }
}
