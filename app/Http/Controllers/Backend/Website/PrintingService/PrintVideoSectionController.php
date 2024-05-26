<?php

namespace App\Http\Controllers\Backend\Website\PrintingService;

use App\Models\Backend\Website\PrintingService\PrintVideoSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintVideoSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printvideo = PrintVideoSection::get();
        return view('backend.website.printvideo.index',compact('printvideo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.printvideo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $printvideo = new PrintVideoSection;
            $printvideo->text_large = $request->text_large;
            $printvideo->text_small = $request->text_small;
            $printvideo->video_link = $request->video_link;
            if($printvideo->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printvideo.index');
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
    public function show(PrintVideoSection $printingHero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $printvideo = PrintVideoSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.printvideo.edit',compact('printvideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $printvideo = PrintVideoSection::findOrFail(encryptor('decrypt',$id));
            $printvideo->text_large = $request->text_large;
            $printvideo->text_small = $request->text_small;
            $printvideo->video_link = $request->video_link;
            if($printvideo->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printvideo.index');
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
        $printvideo = PrintVideoSection::findOrFail(encryptor('decrypt',$id));
        if($printvideo->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('printvideo.index');
        }
    }
}