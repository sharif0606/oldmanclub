<?php

namespace App\Http\Controllers\Backend\Website\LLcHeroSection;

use App\Models\Backend\Website\LLcservice\LlcHeroSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LlcHeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $llchero = LlcHeroSection::get();
        return view('backend.website.llcherosection.index',compact('llchero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.llcherosection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $llchero = new LlcHeroSection;
            $llchero->text_large = $request->text_large;
            $llchero->text_small = $request->text_small;
            if($request->hasFile('background_image')){
                $imageName = rand(111,999).'.'.$request->background_image->extension();
                $request->background_image->move(public_path('uploads/llcservice'),$imageName);
                $llchero->background_image=$imageName;
            }
            if($llchero->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('llchero.index');
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
    public function show(LlcHeroSection $llcHeroSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $llchero = LlcHeroSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.llcherosection.edit',compact('llchero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $llchero = LlcHeroSection::findOrFail(encryptor('decrypt',$id));
            $llchero->text_large = $request->text_large;
            $llchero->text_small = $request->text_small;
            if($request->hasFile('background_image')){
                $imageName = rand(111,999).'.'.$request->background_image->extension();
                $request->background_image->move(public_path('uploads/llcservice'),$imageName);
                $llchero->background_image=$imageName;
            }
            if($llchero->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('llchero.index');
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
        $llchero = LlcHeroSection::findOrFail(encryptor('decrypt',$id));
        if($llchero->delete()){
            $this->notice::success('LLc hero Successfully Deleted');
            return redirect()->route('llchero.index');
        }
    }
}
