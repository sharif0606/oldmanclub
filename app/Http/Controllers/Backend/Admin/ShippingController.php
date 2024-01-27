<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Shipping;
use App\Models\User\client;

class ShippingController extends Controller
{
    public function shipping_list()
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::get();
        return view('backend.shipping.shipping_list',compact('shipping','client'));
    }
    public function shipping_edit($id)
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::findOrFail(encryptor('decrypt',$id));
        return view('backend.shipping.shipping_edit',compact('shipping','client'));
    }
    public function shipping_update(Request $request,$id)
    {   
        try{
            $shipping = Shipping::findOrFail(encryptor('decrypt',$id));
            $shipping->status = $request->status;
            $shipping->reject_note = $request->reject_note;
            if($shipping->save()){
                $this->notice::success('Shipping Successfully saved');
                return redirect()->route('shipping_list');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }
}
