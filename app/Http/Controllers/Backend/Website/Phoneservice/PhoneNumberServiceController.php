<?php

namespace App\Http\Controllers\Backend\Website\Phoneservice;

use App\Models\Backend\Website\PhoneService\PhoneNumberService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneNumberServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phoneservice = PhoneNumberService::get();
        return view('backend.website.phoneservice.index',compact('phoneservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.phoneservice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phoneservice = new PhoneNumberService;
            $phoneservice->text_heading = $request->text_heading;
            $phoneservice->text_small = $request->text_small;
            
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/phoneservice'),$imageName);
                $phoneservice->image=$imageName;
            }
            if($phoneservice->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('phoneservice.index');
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
    public function show(PhoneNumberService $phoneNumberService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $phoneservice = PhoneNumberService::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.phoneservice.edit',compact('phoneservice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phoneservice = PhoneNumberService::findOrFail(encryptor('decrypt',$id));
            $phoneservice->text_heading = $request->text_heading;
            $phoneservice->text_small = $request->text_small;
            
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/phoneservice'),$imageName);
                $phoneservice->image=$imageName;
            }
            if($phoneservice->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('phoneservice.index');
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
        $phoneservice = PhoneNumberService::findOrFail(encryptor('decrypt',$id));
        if($phoneservice->delete()){
            $this->notice::success('Phone service Successfully Deleted');
            return redirect()->route('phoneservice.index');
        }
    }
}
