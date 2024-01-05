<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::get();
        return view('backend.setting.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = new Setting;
            if($request->hasFile('header_logo')){
                $imageName = rand(111,999).time().'.'.
                $request->header_logo->extension();
                $request->header_logo->move(public_path('uploads/setting'), $imageName);
                $data->header_logo=$imageName;
            }
            $data->company_name = $request->company_name;
            $data->contact_no_en = $request->contact_no_en;
            $data->email = $request->email;
            $data->facebook_icon = $request->facebook_icon;
            $data->twitter_icon = $request->twitter_icon;
            $data->linkedln_icon = $request->linkedln_icon;
            $data->instagram_icon = $request->instagram_icon;
            $data->footer_text = $request->footer_text;
            if($request->hasFile('footer_logo')){
                $imageName = rand(111,999).time().'.'.
                $request->footer_logo->extension();
                $request->footer_logo->move(public_path('uploads/setting'), $imageName);
                $data->footer_logo=$imageName;
            }
            if($data->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('setting.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing Wrong! Please try again');
            return redirect()->route('setting.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Setting::findOrFail(encryptor('decrypt',$id));
        return view('backend.setting.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $data = Setting::findOrFail(encryptor('decrypt',$id));
            if($request->hasFile('header_logo')){
                $imageName = rand(111,999).time().'.'.
                $request->header_logo->extension();
                $request->header_logo->move(public_path('uploads/setting'), $imageName);
                $data->header_logo=$imageName;
            }
            $data->company_name = $request->company_name;
            $data->contact_no_en = $request->contact_no_en;
            $data->email = $request->email;
            $data->facebook_icon = $request->facebook_icon;
            $data->twitter_icon = $request->twitter_icon;
            $data->linkedln_icon = $request->linkedln_icon;
            $data->instagram_icon = $request->instagram_icon;
            $data->footer_text = $request->footer_text;
            if($request->hasFile('footer_logo')){
                $imageName = rand(111,999).time().'.'.
                $request->footer_logo->extension();
                $request->footer_logo->move(public_path('uploads/setting'), $imageName);
                $data->footer_logo=$imageName;
            }
            if($data->save()){
                $this->notice::success('Data Successfully saved');
                return redirect()->route('setting.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing Wrong! Please try again');
            return redirect()->route('setting.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Setting::findOrFail(encryptor('decrypt',$id));
        if($data->delete()){
            $this->notice::success('Data Succesfully Deleted');
            return redirect()->route('setting.index');
        }
    }
}
