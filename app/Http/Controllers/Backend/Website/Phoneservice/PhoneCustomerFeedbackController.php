<?php

namespace App\Http\Controllers\Backend\Website\Phoneservice;

use App\Models\Backend\Website\PhoneService\PhoneCustomerFeedback;
use App\Http\Controllers\Controller;
use App\Models\User\Client;
use Illuminate\Http\Request;

class PhoneCustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phonefeedback = PhoneCustomerFeedback::get();
        return view('backend.website.phonefeedback.index',compact('phonefeedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::get();
        return view('backend.website.phonefeedback.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonefeedback = new PhoneCustomerFeedback;
            $phonefeedback->customer_id = $request->customer_id;
            $phonefeedback->customer_message = $request->customer_message;
            if($phonefeedback->save()){
                $this->notice::success('Data Successfully Saved');
                return redirect()->route('phonefeedback.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneCustomerFeedback $phoneVirtualMaps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::get();
        $phonefeedback = PhoneCustomerFeedback::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.phonefeedback.edit',compact('phonefeedback','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonefeedback = PhoneCustomerFeedback::findOrFail(encryptor('decrypt',$id));
            $phonefeedback->customer_id = $request->customer_id;
            $phonefeedback->customer_message = $request->customer_message;
            if($phonefeedback->save()){
                $this->notice::success('Customer Feedback Successfully Updated');
                return redirect()->route('phonefeedback.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phonefeedback = PhoneCustomerFeedback::findOrFail(encryptor('decrypt',$id));
        if($phonefeedback->delete()){
            $this->notice::success('Customer Feedback Successfully Deleted');
            return redirect()->route('phonefeedback.index');
        }
    }
}
