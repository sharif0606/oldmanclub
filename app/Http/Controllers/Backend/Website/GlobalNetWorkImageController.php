<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\GlobalNetWorkImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GlobalNetWorkImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $globalnetwork = GlobalNetWorkImage::get();
        return view('backend.website.globalnetwork.index',compact('globalnetwork'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.globalnetwork.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $globalnet = new GlobalNetWorkImage;
            $globalnet->title = $request->title;
            $globalnet->link = $request->link;
            if($request->hasFile('image')){
                $imageName= rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/globalnetwork'),$imageName);
                $globalnet->image = $imageName;
            }
            if($globalnet->save()){
                $this->notice::success('Data successfully Saved');
                return redirect()->route('globalnetwork.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong!Please try Again');
            return redirect()->route('globalnetwork.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GlobalNetWorkImage $globalNetWorkImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $globalnet = GlobalNetWorkImage::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.globalnetwork.edit',compact('globalnet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $globalnet = GlobalNetWorkImage::findOrFail(encryptor('decrypt',$id));
            $globalnet->title = $request->title;
            $globalnet->link = $request->link;
            if($request->hasFile('image')){
                $imageName= rand(111,999).'.'.$request->image->extension();
                $request->image->move(public_path('uploads/globalnetwork'),$imageName);
                $globalnet->image = $imageName;
            }
            if($globalnet->save()){
                $this->notice::success('Data successfully Saved');
                return redirect()->route('globalnetwork.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong!Please try Again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $globalnet = GlobalNetWorkImage::findOrFail(encryptor('decrypt',$id));
        if($globalnet->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('globalnetwork.index');
        }
    }
}
