<?php

namespace App\Http\Controllers\User;

use App\Models\User\PhoneBook;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Models\User\SendSms;
use App\Models\User\PhoneGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Excel;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        $phonebook = PhoneBook::where('client_id',currentUserId())->paginate(3);
        return view('user.phonebook.index',compact('phonebook','phonegroup','client','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->get();
        return view('user.phonebook.create',compact('phonegroup','client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonebook = new PhoneBook;
            $phonebook->client_id = currentUserId();
            $phonebook->group_id = $request->group_id;
            $phonebook->name_en = $request->name_en;
            $phonebook->contact_en = $request->contact_en;
            $phonebook->email = $request->email;
            if($phonebook->save()){
                $this->notice::success('Phone number Successfully Saved');
                return redirect()->route('phonebook.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = PhoneBook::where('client_id',currentUserId())->get();
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->get();
        $phonebook = PhoneBook::findOrFail(encryptor('decrypt',$id));
        return view('user.phonebook.edit',compact('phonebook','phonegroup','data','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonebook = PhoneBook::findOrFail(encryptor('decrypt',$id));
            $phonebook->client_id = currentUserId();
            $phonebook->group_id = $request->group_id;
            $phonebook->name_en = $request->name_en;
            $phonebook->contact_en = $request->contact_en;
            $phonebook->email = $request->email;
            if($phonebook->save()){
                $this->notice::success('Phone number Successfully Saved');
                return redirect()->route('phonebook.index');
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
        $phonebook = PhoneBook::findOrFail(encryptor('decrypt',$id));
        if($phonebook->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
    public function downloadPhonebook()
    {
        $phonebookData = PhoneBook::where('client_id', currentUserId())->get();
        // $csv = "";
        $csv = mb_convert_encoding("", 'UTF-8', 'UTF-8');
        $csv .= mb_convert_encoding(implode(',', array('Name', 'Contact No', 'E-mail','Given Name',	'Additional Name','Family Name', 'Yomi Name', 'Given Name Yomi', 'Additional Name Yomi',' Family Name Yomi', 'Name Prefix',	'Name Suffix',	'Initials',	'Nickname',	'Short Name', 'Maiden Name',	'Birthday',	'Gender',	'Location', 'Billing Information',	'Directory Server',	'Mileage','Occupation',	'Hobby', 'Sensitivity', 'Priority', 'Subject', 'Notes', 'Language',	'Photo','Group Membership',	'Phone 1 - Type',
        )),'UTF-8', 'UTF-8') . "\n"; // Headers
        foreach ($phonebookData as $row) {
            $csv .= implode(',', array(
                $row->name_en,
                $row->contact_en,
                $row->email,
            )) . "\n";
        }
        $response = Response::make($csv, 200);
        $response->header('Content-Type', 'text/csv;  charset=UTF-8');
        $response->header('Content-Disposition', 'attachment; filename="contacts.csv"');
        return $response;
    }

    public function sendsms(){
        $client = Client::find(currentUserId());
        $data = SendSms::where('client_id',currentUserId())->get();
        return view('user.phonebook.smslist',compact('data','client'));
    }
    public function sms_create(){
        $client = Client::find(currentUserId());
        return view('user.phonebook.smscreate',compact('client'));
    }
    public function sms_store(Request $request){
        $sms = new SendSms;
        $sms->client_id = currentUserId();
        $sms->contact_no = $request->contact_no;
        $sms->message_body = $request->message_body;
        if($sms->save()){
            $this->notice::success('sms successfully send');
            return redirect()->route('sms_create');
        }
    }
}
