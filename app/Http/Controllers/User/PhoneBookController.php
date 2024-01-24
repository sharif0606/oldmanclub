<?php

namespace App\Http\Controllers\User;

use App\Models\Backend\PhoneBook;
use App\Models\User\Client;
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
        $phonebook = PhoneBook::where('client_id',currentUserId())->get();
        return view('user.phonebook.index',compact('phonebook','client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.phonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonebook = new PhoneBook;
            $phonebook->client_id = currentUserId();
            $phonebook->name_en = $request->name_en;
            $phonebook->name_bn = $request->name_bn;
            $phonebook->contact_en = $request->contact_en;
            $phonebook->contact_bn = $request->contact_bn;
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
        $client = Client::find(currentUserId());
        $phonebook = PhoneBook::findOrFail(encryptor('decrypt',$id));
        return view('user.phonebook.edit',compact('phonebook','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonebook = PhoneBook::findOrFail(encryptor('decrypt',$id));
            $phonebook->client_id = currentUserId();
            $phonebook->name_en = $request->name_en;
            $phonebook->name_bn = $request->name_bn;
            $phonebook->contact_en = $request->contact_en;
            $phonebook->contact_bn = $request->contact_bn;
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
        $csv .= mb_convert_encoding(implode(',', array('Name','Name Bangla', 'Contact No', 'E-mail','Given Name',	'Additional Name','Family Name', 'Yomi Name', 'Given Name Yomi', 'Additional Name Yomi',' Family Name Yomi', 'Name Prefix',	'Name Suffix',	'Initials',	'Nickname',	'Short Name', 'Maiden Name',	'Birthday',	'Gender',	'Location', 'Billing Information',	'Directory Server',	'Mileage','Occupation',	'Hobby', 'Sensitivity', 'Priority', 'Subject', 'Notes', 'Language',	'Photo','Group Membership',	'Phone 1 - Type',	
        )),'UTF-8', 'UTF-8') . "\n"; // Headers
        foreach ($phonebookData as $row) {
            $csv .= implode(',', array(
                $row->name_en,
                $row->name_bn,
                $row->contact_en,
                $row->email,
            )) . "\n";
        }
        $response = Response::make($csv, 200);
        $response->header('Content-Type', 'text/csv;  charset=UTF-8');
        $response->header('Content-Disposition', 'attachment; filename="contacts.csv"');
        return $response;
    }
}
