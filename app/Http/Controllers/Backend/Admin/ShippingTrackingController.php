<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Backend\Admin\ShippingTracking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Shipping;
use App\Models\User\client;

class ShippingTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipping = Shipping::get();
        $shiptracking = ShippingTracking::get();
        return view('backend.shiptracking.index',compact('shiptracking','shipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipping = Shipping::get();
        return view('backend.shiptracking.create',compact('shipping'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $shiptracking = new ShippingTracking;
            $shiptracking->shipping_id = $request->shipping_id;
            $shiptracking->tracking_status = $request->tracking_status;
            $shiptracking->location = $request->location;
            $shiptracking->tracking_note = $request->tracking_note;
            if($shiptracking->save()){
                $this->notice::success('Shipping Tracking successfully saved');
                return redirect()->route('shiptrack.index');
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
    public function show(ShippingTracking $shippingTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shipping = Shipping::get();
        $shiptrack = ShippingTracking::findOrFail(encryptor('decrypt',$id));
        return view('backend.shiptracking.edit',compact('shiptrack','shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $shiptracking = ShippingTracking::findOrFail(encryptor('decrypt',$id));
            $shiptracking->tracking_status = $request->tracking_status;
            $shiptracking->shipping_id = $request->shipping_id;
            $shiptracking->location = $request->location;
            $shiptracking->tracking_note = $request->tracking_note;
            if($shiptracking->save()){
                $this->notice::success('Shipping Tracking successfully Updated');
                return redirect()->route('shiptrack.index');
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
        $shiptrack = ShippingStatusType::findOrFail(encryptor('decrypt',$id));
        if($shiptrack->delete()){
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('shiptrack.index');
        }
    }
}
