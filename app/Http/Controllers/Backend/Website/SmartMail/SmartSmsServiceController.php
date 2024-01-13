<?php

namespace App\Http\Controllers\Backend\Website\SmartMail;

use App\Models\Backend\Website\SmartMail\SmartSmsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartSmsServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smartsms = SmartSmsService::get();
        return view('backend.website.smartsms.index',compact('smartsms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.smartsms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $smartsms = new SmartSmsService;
            $smartsms->text_large = $request->text_large;
            $smartsms->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartsms->image=$imageName;
            }
            if($smartsms->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartsms.index');
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
    public function show(SmartSmsService $smartSmsService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $smartsms = SmartSmsService::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.smartsms.edit',compact('smartsms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $smartsms = SmartSmsService::findOrFail(encryptor('decrypt',$id));
            $smartsms->text_large = $request->text_large;
            $smartsms->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartsms->image=$imageName;
            }
            if($smartsms->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartsms.index');
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
        $smartsms = SmartSmsService::findOrFail(encryptor('decrypt',$id));
        if($smartsms->delete()){
            $this->notice::success('Data Successfully  Deleted');
            return redirect()->route('smartsms.index');
        }
    }
}
