<?php

namespace App\Http\Controllers\Backend\Website\SmartMail;

use App\Models\Backend\Website\SmartMail\SmartPhonebookService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartPhonebookServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smartphonebook = SmartPhonebookService::get();
        return view('backend.website.smartphonebook.index',compact('smartphonebook'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.smartphonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $smartphone = new SmartPhonebookService;
            $smartphone->text_large = $request->text_large;
            $smartphone->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartphone->image=$imageName;
            }
            if($smartphone->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartphonebook.index');
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
    public function show(SmartPhonebookService $smartPhonebookService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $smartphonebook = SmartPhonebookService::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.smartphonebook.edit',compact('smartphonebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $smartphone = SmartPhonebookService::findOrFail(encryptor('decrypt',$id));
            $smartphone->text_large = $request->text_large;
            $smartphone->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/smartmailservice'),$imageName);
                $smartphone->image=$imageName;
            }
            if($smartphone->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('smartphonebook.index');
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
        $smartphone = SmartPhonebookService::findOrFail(encryptor('decrypt',$id));
        if($smartphone->delete()){
            $this->notice::success('Data Successfully  Deleted');
            return redirect()->route('smartphonebook.index');
        }
    }
}
