<?php

namespace App\Http\Controllers\Backend\Website\PrintingService;

use App\Models\Backend\Website\PrintingService\PrintCustomerFeedback;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintCustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerfeedback = PrintCustomerFeedback::get();
        return view('backend.website.printfeedback.index',compact('customerfeedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::get();
        return view('backend.website.printfeedback.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $feedback = new PrintCustomerFeedback;
            $feedback->customer_message = $request->customer_message;
            $feedback->customer_id = $request->customer_id;
            if($feedback->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printcus_feedback.index');
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PrintCustomerFeedback $printCustomerFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::get();
        $customerfeedback = PrintCustomerFeedback::findOrFail(encryptor('decrypt',$id));
        return view('backend.website.printfeedback.edit',compact('customerfeedback','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $customerfeedback = PrintCustomerFeedback::findOrFail(encryptor('decrypt',$id));
            $customerfeedback->customer_message = $request->customer_message;
            $customerfeedback->customer_id = $request->customer_id;
            if($customerfeedback->save()){
                $this->notice::success('Data successfully saved');
                return redirect()->route('printcus_feedback.index');
            }
        }catch(Exception $e){
            // dd($e);
            $this->notice::error('Somthing wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $customerfeedback = PrintCustomerFeedback::findOrFail(encryptor('decrypt',$id));
         if($customerfeedback->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('printcus_feedback.index');
        }
    }
}
