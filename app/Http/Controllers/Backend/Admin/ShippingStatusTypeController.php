<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Backend\Admin\ShippingStatusType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Shipping;
use App\Models\User\client;

class ShippingStatusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipping = Shipping::get();
        $shipstatus = ShippingStatusType::get();
        return view('backend.shipstatus.index',compact('shipstatus','shipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipping = Shipping::get();
        return view('backend.shipstatus.create',compact('shipping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $shipstatus = new ShippingStatusType;
            $shipstatus->shipping_id = $request->shipping_id;
            $shipstatus->shipping_address = $request->shipping_address;
            $shipstatus->delivery_address = $request->delivery_address;
            $shipstatus->shipping_method = $request->shipping_method;
            if($shipstatus->save()){
                $this->notice::success('Shipping status successfully saved');
                return redirect()->route('shipstatus.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingStatusType $shippingStatusType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shipping = Shipping::get();
        $shipstatus = ShippingStatusType::findOrFail(encryptor('decrypt',$id));
        return view('backend.shipstatus.edit',compact('shipstatus','shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $shipstatus = ShippingStatusType::findOrFail(encryptor('decrypt',$id));
            $shipstatus->shipping_id = $request->shipping_id;
            $shipstatus->shipping_address = $request->shipping_address;
            $shipstatus->delivery_address = $request->delivery_address;
            $shipstatus->shipping_method = $request->shipping_method;
            if($shipstatus->save()){
                $this->notice::success('Shipping status successfully Updated');
                return redirect()->route('shipstatus.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shipstatus = ShippingStatusType::findOrFail(encryptor('decrypt',$id));
        if($shipstatus->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('shipstatus.index');
        }
    }
}
