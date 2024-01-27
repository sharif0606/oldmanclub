<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Backend\Admin\MailBox;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mailbox = MailBox::get();
        return view('backend.mailbox.index',compact('mailbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.mailbox.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $mailbox = new MailBox;
            $mailbox->number_of_mail = $request->number_of_mail;
            $mailbox->validity = $request->validity;
            $mailbox->price = $request->price;
            $mailbox->package_type = $request->package_type;
            if($mailbox->save()){
                $this->notice::success('Successfully Saved');
                return redirect()->route('mailbox.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MailBox $mailBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mailbox = MailBox::findOrFail(encryptor('decrypt',$id));
        return view('backend.mailbox.edit',compact('mailbox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $mailbox = MailBox::findOrFail(encryptor('decrypt',$id));
            $mailbox->number_of_mail = $request->number_of_mail;
            $mailbox->validity = $request->validity;
            $mailbox->price = $request->price;
            $mailbox->package_type = $request->package_type;
            if($mailbox->save()){
                $this->notice::success('Successfully updated');
                return redirect()->route('mailbox.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mailbox = MailBox::findOrFail(encryptor('decrypt',$id));
        if($mailbox->delete()){
            $this->notice::success('Data Successfully Deleted');
            return redirect()->route('mailbox.index');
        }
    }
}
