<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User\Client;

class OrderController extends Controller
{
    public function order_list(){
        $client = Client::get();
        $order = Order::get();
        return view('backend.order.index',compact('order','client'));
    }
    public function order_edit($id){
        $client = Client::get();
        $order = Order::findOrFail(encryptor('decrypt',$id));
        return view('backend.order.edit',compact('client','order'));
    }
    public function order_update(Request $request, $id){
        try{
            $order = Order::findOrFail(encryptor('decrypt',$id));
            $order->order_status = $request->order_status;
            $order->additional_note = $request->additional_note;
            $order->order_cancel_note = $request->order_cancel_note;
            if($order->save()){
                $this->notice::success('Order Successfully Update');
                return redirect()->route('order_list');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }
}
