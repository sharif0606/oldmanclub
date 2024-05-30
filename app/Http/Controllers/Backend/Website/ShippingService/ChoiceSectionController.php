<?php

namespace App\Http\Controllers\Backend\Website\ShippingService;

use App\Models\Backend\Website\ShippingService\ChoiceSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChoiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $choice = ChoiceSection::get();
        return view('backend.website.shipping_choice.index',compact('choice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.shipping_choice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $choice = new ChoiceSection;
            $featureList = explode(',',$request->feature_list);
            $choice->feature_list = $featureList;
            $choice->video_link = $request->video_link;
            if($choice->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('shippingchoice.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ChoiceSection $choiceSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $choice = ChoiceSection::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.shipping_choice.edit',compact('choice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $choice = ChoiceSection::findOrFail(encryptor('decrypt',$id));
            $choice->feature_list = explode(',',$request->feature_list);
            $choice->video_link = $request->video_link;
            if($choice->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('shippingchoice.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $choice = ChoiceSection::findOrFail(encryptor('decrypt',$id));
        if($choice->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('shippingchoice.index');
        }
    }
}
