<?php

namespace App\Http\Controllers\Backend\Website\SmartMail;

use App\Models\Backend\Website\SmartMail\SmartWorkSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartWorkSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smartwork = SmartWorkSection::get();
        return view('backend.website.smartwork.index',compact('smartwork'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.smartwork.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $smartwork = new SmartWorkSection;
            $smartwork->text_large = $request->text_large;
            $smartwork->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartwork->image=$imageName;
            }
            if($smartwork->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartwork.index');
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
    public function show(SmartWorkSection $smartWorkSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $smartwork = SmartWorkSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.smartwork.edit',compact('smartwork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $smartwork = SmartWorkSection::findOrFail(encryptor('decrypt',$id));
            $smartwork->text_large = $request->text_large;
            $smartwork->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartwork->image=$imageName;
            }
            if($smartwork->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartwork.index');
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
        $smartwork = SmartWorkSection::findOrFail(encryptor('decrypt',$id));
        if($smartwork->delete()){
            $this->notice::success('Data Successfully  Deleted');
            return redirect()->route('smartwork.index');
        }
    }
}
