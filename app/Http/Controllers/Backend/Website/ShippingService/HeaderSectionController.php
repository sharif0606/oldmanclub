<?php

namespace App\Http\Controllers\Backend\Website\ShippingService;

use App\Models\Backend\Website\ShippingService\Header_section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipping = Header_section::get();
        return view('backend.website.shipping_header.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.shipping_header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $shipping = new Header_section;
            $shipping->text_large = $request->text_large;
            $shipping->text_small = $request->text_small;
            if($request->hasFile('header_image')){
                $imageName = rand(111,999).'.'.$request->header_image->extension();
                $request->header_image->move(public_path('uploads/shipping'),$imageName);
                $shipping->header_image = $imageName;
            }
            if($shipping->save()){
                $this->notice::success('Shipping Header Successfully Saved');
                return redirect()->route('shippingheader.index');
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
    public function show(header_section $header_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shipping = header_section::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.shipping_header.edit',compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $shipping = header_section::findOrFail(encryptor('decrypt',$id));
            $shipping->text_large = $request->text_large;
            $shipping->text_small = $request->text_small;
            if($request->hasFile('header_image')){
                $imageName = rand(111,999).'.'.$request->header_image->extension();
                $request->header_image->move(public_path('uploads/shipping'),$imageName);
                $shipping->header_image = $imageName;
            }
            if($shipping->save()){
                $this->notice::success('Shipping Header Successfully Saved');
                return redirect()->route('shippingheader.index');
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
        $shipping = header_section::findOrFail(encryptor('decrypt',$id));
        if($shipping->delete()){
            $this->notice::success('Shipping Header Successfully Deleted');
            return redirect()->route('shippingheader.index');
        }
    }
}
