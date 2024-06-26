<?php

namespace App\Http\Controllers;

use App\Models\User\PurchaseSms;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\Backend\Admin\SmsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $data = PurchaseSms::where('client_id',currentUserId())->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.purchase.index',compact('data','client','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        $sms = SmsPackage::where('status',1)->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.purchase.create',compact('client','sms','postCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingsmspackage =PurchaseSms::where('client_id',currentUserId())->where('smspackage_id',$request->smspackage_id)->first();
        // if($existingmspackage){
        //     $this->notice::error('You have already purchased this SMS package!');
        //     return redirect()->route('purchase.create');
        // }
        if(!$existingsmspackage || $existingsmspackage->number_of_sms == 0){
            $smsPackage = SmsPackage::find($request->smspackage_id);
            $purchase = new PurchaseSms;
            $purchase->client_id = currentUserId();
            $purchase->smspackage_id = $request->smspackage_id;
            $purchase->number_of_sms = $request->number_of_sms;
            $purchase->validity_count = now()->diffInDays($purchase->created_at) + $smsPackage->validity_days;

            if($purchase->save()){
                $this->notice::success('SMS successfully purchased');
                return redirect()->route('purchase.index');
            }
        }
        else{
            $this->notice::error('You have already purchased this SMS package!');
            return redirect()->route('purchase.create');
        }
        $smsPackage = SmsPackage::find($request->smspackage_id);

        $purchase = new PurchaseSms;
        $purchase->client_id = currentUserId();
        $purchase->smspackage_id = $request->smspackage_id;
        $purchase->number_of_sms = $request->number_of_sms;
        // $purchase->validity_count = $request->validity_count;
        // Calculate validity_count based on created_at and validity_days
        $purchase->validity_count = now()->diffInDays($purchase->created_at) + $smsPackage->validity_days;

        if($purchase->save()){
            $this->notice::success('SMS successfully purchased');
            return redirect()->route('purchase.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseSms $purchaseSms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseSms $purchaseSms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseSms $purchaseSms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseSms $purchaseSms)
    {
        //
    }
}
