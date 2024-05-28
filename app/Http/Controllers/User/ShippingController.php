<?php

namespace App\Http\Controllers\User;

use App\Models\User\Shipping;
use App\Models\ShippingDetail;
use App\Models\Backend\Admin\ShippingStatusType;
use App\Models\Backend\Admin\ShippingTracking;
use App\Models\User\ShippingComment;
use App\Models\User\client;
use App\Models\User\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        $shipping = Shipping::where('client_id', currentUserId())->get();
        return view('user.shipping.index', compact('shipping', 'client','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.shipping.create', compact('client','postCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $shipping = new Shipping;
            $shipping->client_id = currentUserId();
            $shipping->status = 1;
            /* $shipping->shipping_title = $request->shipping_title;
            $shipping->shipping_description = $request->shipping_description;*/
            if ($shipping->save()) {

                /*Insert Data Into Shipping Status */
                $shipping_detail = new ShippingDetail;
                $shipping_detail->shipping_id = $shipping->id;
                $shipping_detail->shipping_title = $request->shipping_title;
                $shipping_detail->shipping_description = $request->shipping_description;
                $shipping_detail->price = $request->price;
                if ($request->hasFile('image')) {
                    $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                    $request->image->move(public_path('uploads/shipping'), $imageName);
                    $shipping_detail->image = $imageName;
                }
                if ($shipping_detail->save()) {
                    /*Insert Data Into Shipping Status */
                    $ShippingStatusType = new ShippingStatusType;
                    $ShippingStatusType->shipping_id = $shipping->id;
                    $ShippingStatusType->delivery_address = $request->delivery_address;
                    $ShippingStatusType->shipping_method = $request->shipping_method;
                    if ($ShippingStatusType->save()) {
                        DB::commit();
                        $ShippingTracking = new ShippingTracking;
                        $ShippingTracking->shipping_id = $shipping->id;
                        $ShippingTracking->tracking_status = 1;
                        $ShippingTracking->save();
                        $this->notice::success('Shipping Successfully saved');
                        return redirect()->route('shipping.index');
                    }
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
        return view('user.shipping.show', compact('shipping', 'client','postCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find(currentUserId());
        $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
        $shipping_detail = ShippingDetail::find($id);
        $shipping_status = ShippingStatusType::find($id);
        $shipping_track = ShippingTracking::find($id);
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.shipping.edit', compact('shipping', 'client','postCount','shipping_detail','shipping_status','shipping_track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // dd($request->all());
            $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
            $shipping->client_id = currentUserId();
            $shipping->status = 1;
            if ($shipping->save()) {
                /*Insert Data Into Shipping Status */
                $shipping_detail =ShippingDetail::where('shipping_id',encryptor('decrypt',$id))->first();
                $shipping_detail->shipping_id = $shipping->id;
                $shipping_detail->shipping_title = $request->shipping_title;
                $shipping_detail->shipping_description = $request->shipping_description;
                $shipping_detail->price = $request->price;
                if($request->hasFile('image')) {
                    $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                    $request->image->move(public_path('uploads/shipping'), $imageName);
                    $shipping_detail->image = $imageName;
                }
                if ($shipping_detail->save()) {
                    /*Insert Data Into Shipping Status */
                    $ShippingStatusType = ShippingStatusType::where('shipping_id',encryptor('decrypt',$id))->first();
                    $ShippingStatusType->shipping_id = $shipping->id;
                    $ShippingStatusType->delivery_address = $request->delivery_address;
                    $ShippingStatusType->shipping_method = $request->shipping_method;
                    if ($ShippingStatusType->save()) {
                        DB::commit();
                        $ShippingTracking = ShippingTracking::where('shipping_id',encryptor('decrypt',$id))->first();
                        $ShippingTracking->shipping_id = $shipping->id;
                        $ShippingTracking->tracking_status = 1;
                        $ShippingTracking->save();
                        $this->notice::success('Shipping Successfully saved');
                        return redirect()->route('shipping.index');
                    }
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function shipp_comment($id){
        $client = Client::find(currentUserId());
        $ship_comment = ShippingComment::where('client_id',$id)->get();
        $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
        return view('user.shipping.comment', compact('shipping', 'client','ship_comment'));
    }
    public function storeComment(Request $request, $id)
    {
        try {
            $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
            $comment = new ShippingComment;
            $comment->shipping_id = $shipping->id;
            $comment->client_id = currentUserId(); // Assuming you have a function to get the current user ID
            $comment->body = $request->body;
            $comment->save();

            return redirect()->route('shipp_comment_store');
        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add comment');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shipping = Shipping::findOrFail(encryptor('decrypt', $id));
        if ($shipping->delete()) {
            $this->notice::success('Shipping Successfully Deleted');
            return redirect()->route('shipping.index');
        }
    }
}
