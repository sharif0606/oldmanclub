<?php

namespace App\Http\Controllers\User;

use App\Models\User\Shipping;
use App\Models\User\ShippingComment;
use App\Models\User\client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::where('client_id',currentUserId())->get();
        return view('user.shipping.index',compact('shipping','client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        return view('user.shipping.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $shipping = new Shipping;
            $shipping->client_id = currentUserId();
            $shipping->shipping_title = $request->shipping_title;
            $shipping->shipping_description = $request->shipping_description;
            if($shipping->save()){
                $this->notice::success('Shipping Successfully saved');
                return redirect()->route('shipping.index');
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
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::findOrFail(encryptor('decrypt',$id));
        return view('user.shipping.edit',compact('shipping','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $shipping = Shipping::findOrFail(encryptor('decrypt',$id));
            $shipping->shipping_title = $request->shipping_title;
            $shipping->shipping_description = $request->shipping_description;
            if($shipping->save()){
                $this->notice::success('Shipping Successfully saved');
                return redirect()->route('shipping.index');
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
        $shipping = Shipping::findOrFail(encryptor('decrypt',$id));
        if($shipping->delete()){
           $this->notice::success('Shipping Successfully Deleted');
           return redirect()->route('shipping.index'); 
        }
    }
}