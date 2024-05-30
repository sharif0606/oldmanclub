<?php

namespace App\Http\Controllers\Backend\Website\ShippingService;

use App\Models\Backend\Website\ShippingService\Service_section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service_section::get();
        return view('backend.website.shipping_service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.website.shipping_service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $service = new Service_section;
            if($request->hasFile('service_image')){
                $imageName = rand(111,999).'.'.$request->service_image->extension();
                $request->service_image->move(public_path('uploads/shipping'),$imageName);
                $service->service_image = $imageName;
            }
            $service->service_title = $request->service_title;
            $service->service_description = $request->service_description;
            if($service->save()){
                $this->notice::success('Shipping Header Successfully Saved');
                return redirect()->route('shippingservice.index');
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
    public function show(Service_section $service_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service_section::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.shipping_service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $service = Service_section::findOrFail(encryptor('decrypt',$id));
            if($request->hasFile('service_image')){
                $imageName = rand(111,999).'.'.$request->service_image->extension();
                $request->service_image->move(public_path('uploads/shipping'),$imageName);
                $service->service_image = $imageName;
            }
            $service->service_title = $request->service_title;
            $service->service_description = $request->service_description;
            if($service->save()){
                $this->notice::success('Shipping Header Successfully Updated');
                return redirect()->route('shippingservice.index');
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
        $service = Service_section::findOrFail(encryptor('decrypt',$id));
        if($service->delete()){
            $this->notice::success('Shipping Service Successfully Deleted');
            return redirect()->route('shippingservice.index');
        }
    }
}
