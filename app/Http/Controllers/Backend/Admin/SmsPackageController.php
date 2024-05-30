<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Backend\Admin\SmsPackage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms = SmsPackage::get();
        return view('backend.sms.index',compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $sms = new SmsPackage;
            $sms->package_type = $request->package_type;
            $sms->title = $request->title;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/sms'),$imageName);
                $sms->image=$imageName;
            }
            $sms->number_of_sms = $request->number_of_sms;
            $sms->validity_days = $request->validity_days;
            $sms->price = $request->price;
            $sms->discount_percentage = $request->discount_percentage;
            $sms->discount_price = $request->discount_price;
            $sms->per_sms_charge = $request->per_sms_charge;
            $sms->status = 1;
             if($sms->save()){
                $this->notice::success('Successfully updated');
                return redirect()->route('sms.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SmsPackage $smsPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sms = SmsPackage::findOrFail(encryptor('decrypt',$id));
        return view('backend.sms.edit',compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $sms = SmsPackage::findOrFail(encryptor('decrypt',$id));
            $sms->package_type = $request->package_type;
            $sms->title = $request->title;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/sms'),$imageName);
                $sms->image=$imageName;
            }
            $sms->number_of_sms = $request->number_of_sms;
            $sms->validity_days = $request->validity_days;
            $sms->price = $request->price;
            $sms->discount_percentage = $request->discount_percentage;
            $sms->discount_price = $request->discount_price;
            $sms->per_sms_charge = $request->per_sms_charge;
            $sms->status = $request->status;
             if($sms->save()){
                $this->notice::success('Successfully updated');
                return redirect()->route('sms.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sms = SmsPackage::findOrFail(encryptor('decrypt',$id));
        if($sms->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('sms.index');
        }
    }
}
