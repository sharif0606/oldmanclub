<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::get();
        return view('backend.website.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $slider = new Slider;
            $slider->text_large = $request->text_large;
            $slider->text_small = $request->text_small;
            $slider->link = $request->link;
            $slider->order_by = $request->order_by;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/slider'), $imageName);
                $slider->image=$imageName;
            }
            if($slider->save()){
                $this->notice::success('slider successfully Saved');
                return redirect()->route('slider.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('slider.create');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $slider = Slider::findOrFail(encryptor('decrypt',$id));
            $slider->text_large = $request->text_large;
            $slider->text_small = $request->text_small;
            $slider->link = $request->link;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/setting'), $imageName);
                $slider->image=$imageName;
            }
            if($slider->save()){
                $this->notice::success('slider successfully Updated');
                return redirect()->route('slider.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('slider.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail(encryptor('decrypt',$id));
        if($slider->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('slider.index');
        }
    }
}
