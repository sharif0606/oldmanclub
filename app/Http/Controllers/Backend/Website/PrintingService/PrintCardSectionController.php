<?php

namespace App\Http\Controllers\Backend\Website\PrintingService;

use App\Models\Backend\Website\PrintingService\PrintCardSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintCardSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printcard = PrintCardSection::get();
        return view('backend.website.printcard.index',compact('printcard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.printcard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $printcard = new PrintCardSection;
            $printcard->title = $request->title;
             if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/printservice'),$imageName);
                $printcard->image = $imageName;
            }
            if($printcard->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printcard.index');
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PrintCardSection $printCardSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $printcard = PrintCardSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.printcard.edit',compact('printcard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $printcard = PrintCardSection::findOrFail(encryptor('decrypt',$id));
            $printcard->title = $request->title;
             if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/printservice'),$imageName);
                $printcard->image = $imageName;
            }
            if($printcard->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printcard.index');
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $printcard = PrintCardSection::findOrFail(encryptor('decrypt',$id));
        if($printcard->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('printcard.index');
        }
    }
}