<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\OurServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use Intervention\Image\Facades\Image;
Use File;

class OurServicesController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ourservices =  OurServices::get();
        return view('backend.website.ourservice.index',compact('ourservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.ourservice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $ourservices = new OurServices;
            $ourservices->title = $request->title;
            $ourservices->link = $request->link;
            $ourservices->details = $request->details;

            // if($request->has('image'))
            //     $ourservices->image=$this->resizeImage($request->image,'uploads/ourservices',true,300,200,false);
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Set specific size for the image
                $imageResize = Image::make($image)->resize(300, 300);

                $imageName = rand(111, 999).'.'.$image->extension();
                $imagePath = public_path('uploads/ourservices/') . $imageName;
                
                // Save the resized image
                $imageResize->save($imagePath);

                $ourservices->image = $imageName;
            }
            // if($request->hasFile('image')){
            //     $imageName = rand(111, 999).'.'.$request->image->extension();
            //     $request->image->move(public_path('uploads/ourservices'),$imageName);
            //     $ourservices->image = $imageName;
            // }
            if($ourservices->save()){
                $this->notice::success('OurServices Successfully Saved');
                return redirect()->route('ourservice.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('ourservice.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OurServices $ourServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.ourservice.edit',compact('ourservices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            // dd($request->all());
            $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
            $ourservices->title = $request->title;
            $ourservices->link = $request->link;
            $ourservices->details = $request->details;

            // $path='uploads/ourservices';
            // if ($request->hasFile('image')) {
            //     $this->deleteImage($ourservices->image, $path);
            //     $imageName = $this->resizeImage($request->file('image'), $path, true, 300, 200, false);
            //     $ourservices->image = $imageName;
            // }
            $path = 'uploads/ourservices';

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Delete the old image
                $this->deleteImage($ourservices->image, $path);

                // Set specific size for the image
                $imageResize = Image::make($image)->resize(300, 300);

                $imageName = rand(111, 999) . '.' . $image->extension();
                $imagePath = public_path("$path/$imageName");

                // Save the resized image
                $imageResize->save($imagePath);

                $ourservices->image = $imageName;
            }
            // if($request->hasFile('image')){
            //     $imageName = rand(111, 999).'.'.$request->image->extension();
            //     $request->image->move(public_path('uploads/ourservices'),$imageName);
            //     $ourservices->image = $imageName;
            // }
            if($ourservices->save()){
                $this->notice::success('OurServices Successfully Updated');
                return redirect()->route('ourservice.index');
            }
            else{
                return redirect()->back()->withInput();
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->route('ourservice.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ourservices = OurServices::findOrFail(encryptor('decrypt',$id));
        if($ourservices->delete()){
            $this->notice::success('Data Successfully Delete');
            return redirect()->route('ourservice.index');
        }
    }
}
