<?php

namespace App\Http\Controllers\Backend\Website\LLcHeroSection;

use App\Models\Backend\Website\LLcservice\Llcservice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LlcserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $llcservice = Llcservice::get();
        return view('backend.website.llcservice.index',compact('llcservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.llcservice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $llcservice = new Llcservice;
            $llcservice->title = $request->title;
            $llcservice->feature_list = explode(', ', $request->feature_list);
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/llcservice'),$imageName);
                $llcservice->image=$imageName;
            }
            $llcservice->video_link = $request->video_link;
            if($llcservice->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('llcservice.index');
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
    public function show(Llcservice $llcservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $llcservice = Llcservice::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.llcservice.edit',compact('llcservice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $llcservice = Llcservice::findOrFail(encryptor('decrypt',$id));
            $llcservice->title = $request->title;
            $llcservice->feature_list = explode(', ', $request->feature_list);
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/llcservice'),$imageName);
                $llcservice->image=$imageName;
            }
            $llcservice->video_link = $request->video_link;
            if($llcservice->save()){
                $this->notice::success('LLc hero Successfully Updated');
                return redirect()->route('llcservice.index');
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
        $llcservice = Llcservice::findOrFail(encryptor('decrypt',$id));
        if($llcservice->delete()){
            $this->notice::success('LLc service Successfully Deleted');
            return redirect()->route('llcservice.index');
        }
    }
}
