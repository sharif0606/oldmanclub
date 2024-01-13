<?php

namespace App\Http\Controllers\Backend\Website\Phoneservice;

use App\Models\Backend\Website\PhoneService\PhoneNumberHero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneNumberHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phonehero = PhoneNumberHero::get();
        return view('backend.website.phonehero.index',compact('phonehero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.phonehero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonehero = new PhoneNumberHero;
            $phonehero->text_large = $request->text_large;
            $phonehero->text_small = $request->text_small;
            $phonehero->price = $request->price;
            if($request->hasFile('background_image')){
                $imageName = rand(111,999).'.'.$request->background_image->extension();
                $request->background_image->move(public_path('uploads/phoneservice'),$imageName);
                $phonehero->background_image=$imageName;
            }
            if($phonehero->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('phonehero.index');
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
    public function show(PhoneNumberHero $phoneNumberHero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $phonehero = PhoneNumberHero::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.phonehero.edit',compact('phonehero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonehero = PhoneNumberHero::findOrFail(encryptor('decrypt',$id));
            $phonehero->text_large = $request->text_large;
            $phonehero->text_small = $request->text_small;
            $phonehero->price = $request->price;
            if($request->hasFile('background_image')){
                $imageName = rand(111,999).'.'.$request->background_image->extension();
                $request->background_image->move(public_path('uploads/phoneservice'),$imageName);
                $phonehero->background_image=$imageName;
            }
            if($phonehero->save()){
                $this->notice::success('LLc hero Successfully Saved');
                return redirect()->route('phonehero.index');
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
        $phonehero = PhoneNumberHero::findOrFail(encryptor('decrypt',$id));
        if($phonehero->delete()){
            $this->notice::success('Phone Hero service Successfully Deleted');
            return redirect()->route('phonehero.index');
        }
    }
}
