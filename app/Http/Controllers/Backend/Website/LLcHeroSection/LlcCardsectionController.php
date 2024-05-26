<?php

namespace App\Http\Controllers\Backend\Website\LLcHeroSection;

use App\Models\Backend\Website\LLcservice\LlcCardsection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LlcCardsectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $llccard = LlcCardsection::get();
        return view('backend.website.llccardsection.index',compact('llccard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.llccardsection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $llccard = new LlcCardsection;
            $llccard->text_large = $request->text_large;
            $llccard->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/llcservice'),$imageName);
                $llccard->image=$imageName;
            }
            $llccard->contact_text_large = $request->contact_text_large;
            $llccard->contact_text_small = $request->contact_text_small;
            if($llccard->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('llccard.index');
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
    public function show(LlcCardsection $llcCardsection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $llccard = LlcCardsection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.llccardsection.edit',compact('llccard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $llccard = LlcCardsection::findOrFail(encryptor('decrypt',$id));
            $llccard->text_large = $request->text_large;
            $llccard->text_small = $request->text_small;
            if($request->hasFile('image')){
                $imageName = rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/llcservice'),$imageName);
                $llccard->image=$imageName;
            }
            $llccard->contact_text_large = $request->contact_text_large;
            $llccard->contact_text_small = $request->contact_text_small;
            if($llccard->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('llccard.index');
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
        $llccard = LlcCardsection::findOrFail(encryptor('decrypt',$id));
        if($llccard->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('llccard.index');
        }
    }
}
