<?php

namespace App\Http\Controllers\Backend\Website\Phoneservice;

use App\Models\Backend\Website\PhoneService\PhoneVirtualMaps;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneVirtualMapsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phonemaps = PhoneVirtualMaps::get();
        return view('backend.website.phonemaps.index',compact('phonemaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.phonemaps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonemaps = new PhoneVirtualMaps;
            $phonemaps->text_large = $request->text_large;
            $phonemaps->text_small = $request->text_small;
            
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/phoneservice'),$imageName);
                $phonemaps->image=$imageName;
            }
            if($phonemaps->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('phonemaps.index');
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
    public function show(PhoneVirtualMaps $phoneVirtualMaps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $phonemaps = PhoneVirtualMaps::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.phonemaps.edit',compact('phonemaps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonemaps = PhoneVirtualMaps::findOrFail(encryptor('decrypt',$id));
            $phonemaps->text_large = $request->text_large;
            $phonemaps->text_small = $request->text_small;
            
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/phoneservice'),$imageName);
                $phonemaps->image=$imageName;
            }
            if($phonemaps->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('phonemaps.index');
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
        $phonemaps = PhoneVirtualMaps::findOrFail(encryptor('decrypt',$id));
        if($phonemaps->delete()){
            $this->notice::success('Phone Maps Successfully Deleted');
            return redirect()->route('phonemaps.index');
        }
    }
}
