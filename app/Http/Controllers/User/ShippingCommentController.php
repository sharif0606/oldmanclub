<?php

namespace App\Http\Controllers\User;

use App\Models\User\ShippingComment;
use App\Models\User\Shipping;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::where('client_id',currentUserId())->get();
        $shippingcomment = ShippingComment::get();
        return view('user.shippingcomment.index',compact('shipping','shippingcomment','client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::where('client_id',currentUserId())->get();
        return view('user.shippingcomment.create',compact('shipping','client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $comment = new ShippingComment;
            $comment->shipping_id = $request->shipping_id;
            $comment->client_message = $request->client_message;
            if($comment->save()){
                $this->notice::success('Message Successfully send');
                return redirect()->route('shipcomment.index');
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
    public function show(ShippingComment $shippingComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingComment $shippingComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingComment $shippingComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingComment $shippingComment)
    {
        //
    }
}
