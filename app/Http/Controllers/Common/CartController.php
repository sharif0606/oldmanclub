<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Common\CartItem;
use App\Models\Backend\PrintingService;
class CartController extends Controller
{
    public function cart()
    {
        $setting = \App\Models\Backend\Website\Setting::first();
        return view('frontend.cart',compact('setting')); 
    }
    public function addToCart($id)
    {
        $product = PrintingService::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $this->notice::warning('You have already added this course in your cart.');
            return redirect()->back();
            //$cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "service_name" => $product->service_name,
                "qty" => 1,
                "price" => $product->price,
            ];
            session()->put('cart', $cart);
            $this->cart_total();
            $message="Product added to cart successfully!";
            return redirect()->back()->with('success', $message);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $this->cart_total();
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function cart_total(){
        $total = 0;
        if (session('cart')){
            foreach (session('cart') as $id => $details){
               $total += $details['price'] * $details['qty'];
            }
        }
        if(isset(session('cart_details')[''])){
            $cart_total=$total;
            $discount=($cart_total*(session('cart_details')['discount']/100));
            $tax=(($cart_total-$discount)*0.15);
            $total_amount=(($cart_total+$tax)-$discount);
            // $coupondata=array(
            //     'cart_total'=>$cart_total,
            //     'coupon_code'=>session('cart_details')['coupon_code'],
            //     'discount'=>session('cart_details')['discount'],
            //     'discount_amount'=>$discount,
            //     'tax'=>$tax,
            //     'total_amount'=>$total_amount
            // );
            session()->put('cart_details', $coupondata);
        }else{
            $cart_data=array('cart_total'=>$total,'tax'=>($total*0.15),'total_amount'=>($total + ($total*0.15)));
            session()->put('cart_details', $cart_data);
        }

        
    }
}
