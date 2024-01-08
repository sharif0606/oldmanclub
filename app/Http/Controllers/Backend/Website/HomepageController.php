<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\Homepage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homepage = Homepage::get();
        return view('backend.website.homepage.index',compact('homepage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.homepage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $homepage = new Homepage;
            $homepage->service_section_text = $request->service_section_text;
            $homepage->special_offer_text = $request->special_offer_text;
            $homepage->special_offer_link = $request->special_offer_link;
            $homepage->global_network_text = $request->global_network_text;
            $homepage->customer_feedback_text = $request->customer_feedback_text;
            if($request->hasFile('special_offer_image')){
                $imageName = rand(111,999).'.'.$request->special_offer_image->extension();
                $request->special_offer_image->move(public_path('uploads/homepage'),$imageName);
                $homepage->special_offer_image = $imageName;
            }
            if($request->hasFile('global_network_image')){
                $imageName = rand(111,999).'.'.$request->global_network_image->extension();
                $request->global_network_image->move(public_path('uploads/homepage'),$imageName);
                $homepage->global_network_image = $imageName;
            }
            if($homepage->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('homepage.index');
            }else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try Again');
            return redirect()->route('homepage.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Homepage $homepage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $homepage = Homepage::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.homepage.edit',compact('homepage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $homepage = Homepage::findOrFail(encryptor('decrypt',$id));
            $homepage->service_section_text = $request->service_section_text;
            $homepage->special_offer_text = $request->special_offer_text;
            $homepage->special_offer_link = $request->special_offer_link;
            $homepage->global_network_text = $request->global_network_text;
            $homepage->customer_feedback_text = $request->customer_feedback_text;
            if($request->hasFile('special_offer_image')){
                $imageName = rand(111,999).'.'.$request->special_offer_image->extension();
                $request->special_offer_image->move(public_path('uploads/homepage'),$imageName);
                $homepage->special_offer_image = $imageName;
            }
            if($request->hasFile('global_network_image')){
                $imageName = rand(111,999).'.'.$request->global_network_image->extension();
                $request->global_network_image->move(public_path('uploads/homepage'),$imageName);
                $homepage->global_network_image = $imageName;
            }
            if($homepage->save()){
                $this->notice::success('Data Successfully Updated');
                return redirect()->route('homepage.index');
            }else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try Again');
            return redirect()->route('homepage.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $homepage = Homepage::findOrFail(encryptor('decrypt',$id));
        if($homepage->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('homepage.index');
        }
    }
}
