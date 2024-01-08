<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Backend\Website\CustomerFeedback;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = CustomerFeedback::get();
        return view('backend.website.customerfeedback.index',compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::get();
        return view('backend.website.customerfeedback.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $feedback = new CustomerFeedback;
            $feedback->customer_id = $request->customer_id;
            $feedback->rate = $request->rate;
            $feedback->message = $request->message;
            $feedback->show_hide = $request->show_hide;
            if($feedback->save())
                $this->notice::success('Customer Feedback Successfully Saved');
                return redirect()->route('cus_feedback.index');   
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->route('cus_feedback.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::get();
        $feedback = CustomerFeedback::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.customerfeedback.edit',compact('feedback','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $feedback = CustomerFeedback::findOrFail(encryptor('decrypt',$id));
            $feedback->customer_id = $request->customer_id;
            $feedback->rate = $request->rate;
            $feedback->message = $request->message;
            $feedback->show_hide = $request->show_hide;
            if($feedback->save())
                $this->notice::success('Customer Feedback Successfully Updated');
                return redirect()->route('cus_feedback.index');   
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->route('cus_feedback.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feedback = CustomerFeedback::findOrFail(encryptor('decrypt',$id));
        if($feedback->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('cus_feedback.index');
        }
    }
}
