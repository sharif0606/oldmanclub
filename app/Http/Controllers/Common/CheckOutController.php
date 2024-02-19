<?php

namespace App\Http\Controllers\Common;

use App\Models\Common\CheckOut;
use App\Models\Common\Cart;
use App\Models\Common\CartItem;
use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PrintingService;
use DB;
use Session;
class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = \App\Models\Backend\Website\Setting::first();
        return view('frontend.checkout', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $request->validate(
                [
                    'address' => 'required',
                ]
            );
            if (!session()->get('userId') && currentUser() !='user')
                return redirect(route('clientlogin'));
            $cart_data = session()->get('cart');
            $cart = new Cart;
            $cart->client_id = currentUserId();
            if ($cart->save()) {
                foreach ($cart_data as $key => $serviceData) {
                    $cart_item = new CartItem;
                    $cart_item->printing_service_id = $key;
                    $cart_item->cart_id = $cart->id;
                    $cart_item->quantity = $serviceData['quantity'];
                    $cart_item->price = $serviceData['price'];
                    $cart_item->save();
                }
            }
            $shipping_address = new ShippingAddress;
            $shipping_address->client_id = currentUserId();
            $shipping_address->type = $request->type;
            $shipping_address->address = $request->address;
            if ($shipping_address->save()) {
                /*==Insert Data into Order Table (New Order Received) ====*/
                $order = new Order;
                $order->tracking_no = $this->generateOrderTrackingNumber();
                $order->client_id = currentUserId();
                $order->shipping_address_id = $shipping_address->id;
                $order->cart_id = $cart->id;
                $order->order_status = 1;
                $order->total = session('cart_details')['total_amount'];
                $order->payable = session('cart_details')['total_amount'];
                if($order->save()){
                    $payment = New Payment;
                    $payment->client_id = currentUserId();
                    $payment->order_id = $order->id;
                    $payment->total = session('cart_details')['total_amount'];
                    $payment->payable = session('cart_details')['total_amount'];
                    $payment->payment_method = 1;
                    $payment->save();
                    DB::commit();
                    Session::forget('cart');
                    Session::forget('cart_total');
                    Session::forget('tax');
                    Session::forget('cart_details');
                    $message="Order Placed Successfully!";
                    return redirect()->route('frontend')->with('success', $message);
                }
            }
        }catch(Exception $e){
            DB::rollBack();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
        
    }
    function generateOrderTrackingNumber()
    {
        // Generate a unique timestamp
        $timestamp = time();

        // Generate a random alphanumeric string
        $randomString = bin2hex(random_bytes(4)); // Generates a random string of 8 characters

        // Concatenate the timestamp and random string to create the tracking number
        $trackingNumber = 'TN' . $timestamp . $randomString;

        return $trackingNumber;
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckOut $checkOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckOut $checkOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckOut $checkOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckOut $checkOut)
    {
        //
    }
}
