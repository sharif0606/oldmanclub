<?php

namespace App\Http\Controllers\User;

use App\Models\User\EmailSend;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailSendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = EmailSend::get();
        return view('user.email.index',compact('email'));
    }
    public function inbox(){
        $receive_email = EmailSend::get();
        return view('user.email.inbox',compact('receive_email'));
    }
    public function sentbox(){
        $send_email = EmailSend::where('sender_id',currentUserId())->get();
        return view('user.email.sentbox',compact('send_email'));
    }
    public function sent_email(){
        return view('user.email.sentemail');
    }
    public function store_email(Request $request){
        try{
            $email = new EmailSend;
            $email->sender_id = currentUserId();
            $email->to_email = $request->to_email;
            $email->subject = $request->subject;
            $email->message = $request->message;
            if($request->hasFile('image_file')){
                $fileName = rand(111,999).time().'.'.$request->image_file->extension();
                $request->image_file->move(public_path('uploads/emails'), $fileName);
                $email->file=$fileName;
            }
            if($email->save()){
                $this->notice::success('Email Successfully send');
                return redirect()->route('sentbox');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function sent_email_show($id){
        $client = Client::find(currentUserId());
        $sentmail = EmailSend::findOrFail(encryptor('decrypt',$id));
        return view('user.email.sentmailshow',compact('sentmail','client'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(EmailSend $emailSend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailSend $emailSend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailSend $emailSend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailSend $emailSend)
    {
        //
    }
}
