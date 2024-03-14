<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User\Client;
use App\Models\Common\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $order = Order::where('client_id',currentUserID())->get();
        return view('user.order.index',compact('order','client'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function order_edit(Request $request, $id){
        $order = Order::where('cart_id',$id)->first();
        return view('user.order.edit',compact('order'));
    }
    public function order_update(Request $request, $id){
        $cartItem = CartItem::where('cart_id',$id)->first();
        if($request->hasFile('sample_image')){
            $imageName = rand(111,999).'.'.$request->sample_image->extension();
            $request->sample_image->move(public_path('uploads/cart_items'),$imageName);
            $cartItem->sample_image=$imageName;
        }
        if($cartItem->save()){
            $this->notice::success('cart item successfully update');
            return redirect()->route('order.index');
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
