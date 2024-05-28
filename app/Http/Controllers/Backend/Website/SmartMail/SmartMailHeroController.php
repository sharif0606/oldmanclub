<?php

namespace App\Http\Controllers\Backend\Website\SmartMail;

use App\Models\Backend\Website\SmartMail\SmartMailHero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartMailHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smartmailhero = SmartMailHero::get();
        return view('backend.website.smartmailhero.index',compact('smartmailhero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.smartmailhero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $smarthero = new SmartMailHero;
            $smarthero->text_large = $request->text_large;
            $smarthero->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smarthero->image=$imageName;
            }
            if($smarthero->save()){
                $this->notice::success('Smart Mail Hero Successfully Saved');
                return redirect()->route('smartmailhero.index');
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
    public function show(SmartMailHero $smartMailHero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $smarthero = SmartMailHero::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.smartmailhero.edit',compact('smarthero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $smarthero = SmartMailHero::findOrFail(encryptor('decrypt',$id));
            $smarthero->text_large = $request->text_large;
            $smarthero->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smarthero->image=$imageName;
            }
            if($smarthero->save()){
                $this->notice::success('Smart Mail Hero Successfully Updated');
                return redirect()->route('smartmailhero.index');
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
        $smarthero = SmartMailHero::findOrFail(encryptor('decrypt',$id));
        if($smarthero->delete()){
            $this->notice::success('Smart Mail Hero Successfully Deleted');
            return redirect()->route('smartmailhero.index');
        }
    }
}
