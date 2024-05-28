<?php

namespace App\Http\Controllers\Backend\Website\PrintingService;

use App\Models\Backend\Website\PrintingService\PrintingHero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintingHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printhero = PrintingHero::get();
        return view('backend.website.printhero.index',compact('printhero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.printhero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $printhero = new PrintingHero;
            $printhero->text_large = $request->text_large;
            $printhero->text_small = $request->text_small;
             if($request->hasFile('hero_image')){
                $imageName = rand(111,999).'.'.$request->hero_image->extension();
                $request->hero_image->move(public_path('uploads/printservice'),$imageName);
                $printhero->hero_image = $imageName;
            }
            if($printhero->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printhero.index');
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
    public function show(PrintingHero $printingHero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $printhero = PrintingHero::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.printhero.edit',compact('printhero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $printhero = PrintingHero::findOrFail(encryptor('decrypt',$id));
            $printhero->text_large = $request->text_large;
            $printhero->text_small = $request->text_small;
             if($request->hasFile('print_image')){
                $imageName = rand(111,999).'.'.$request->print_image->extension();
                $request->print_image->move(public_path('uploads/printservice'),$imageName);
                $printhero->print_image = $imageName;
            }
            if($printhero->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printhero.index');
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
        $printhero = PrintingHero::findOrFail(encryptor('decrypt',$id));
        if($printhero->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('printhero.index');
        }
    }
}