<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\OurServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourservices =  OurServices::get();
        return view('backend.website.ourservice.index',compact('ourservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.ourservice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $ourservices = new OurServices;
            $ourservices->title = $request->title;
            $ourservices->link = $request->link;
            $ourservices->details = $request->details;
            if($request->hasFile('image')){
                $imageName = rand(111, 999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/ourservices'),$imageName);
                $ourservices->image = $imageName;
            }
            if($ourservices->save()){
                $this->notice::success('OurServices Successfully Saved');
                return redirect()->route('ourservice.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('ourservice.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OurServices $ourServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.ourservice.edit',compact('ourservices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
            $ourservices->title = $request->title;
            $ourservices->link = $request->link;
            $ourservices->details = $request->details;
            if($request->hasFile('image')){
                $imageName = rand(111, 999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/ourservices'),$imageName);
                $ourservices->image = $imageName;
            }
            if($ourservices->save()){
                $this->notice::success('OurServices Successfully Updated');
                return redirect()->route('ourservice.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('ourservice.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
        if($ourservices->delete()){
            $this->notice::success('Data Successfully Delete');
            return redirect()->route('ourservice.index');
        }
    }
}
