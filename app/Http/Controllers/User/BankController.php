<?php

namespace App\Http\Controllers\User;

use App\Models\User\Bank;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bank::where('client_id',currentUserID())->get();
        return view('user.bank.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::get();
        return view('user.bank.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $bank = new Bank;
            $bank->bank_name = $request->bank_name;
            $bank->branch_name = $request->branch_name;
            if($request->hasFile('bank_logo')){
                $imageName = rand(111,999).time().'.'.$request->bank_logo->extension();
                $request->bank_logo->move(public_path('uploads/bank'), $imageName);
                $bank->bank_logo=$imageName;
            }
            $bank->rtn_number = $request->rtn_number;
            $bank->swift_code = $request->swift_code;
            $bank->contact_no = $request->contact_no;
            $bank->email = $request->email;
            $bank->address = $request->address;
            $bank->city = $request->city;
            $bank->state = $request->state;
            $bank->zip_code = $request->zip_code;
            $bank->client_id = currentUserID();
            if($bank->save()){
                $this->notice::success('Bank Requested Successfully send');
                return redirect()->route('bank.index');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail(encryptor('decrypt',$id));
        return view('user.bank.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       try{
            $bank = Bank::findOrFail(encryptor('decrypt',$id));
            $bank->bank_name = $request->bank_name;
            $bank->branch_name = $request->branch_name;
            if($request->hasFile('bank_logo')){
                $imageName = rand(111,999).time().'.'.$request->bank_logo->extension();
                $request->bank_logo->move(public_path('uploads/bank'), $imageName);
                $bank->bank_logo=$imageName;
            }
            $bank->rtn_number = $request->rtn_number;
            $bank->swift_code = $request->swift_code;
            $bank->contact_no = $request->contact_no;
            $bank->email = $request->email;
            $bank->address = $request->address;
            $bank->city = $request->city;
            $bank->state = $request->state;
            $bank->zip_code = $request->zip_code;
            if($bank->save()){
                $this->notice::success('Bank Requested Successfully Updated');
                return redirect()->route('bank.index');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail(encryptor('decrypt',$id));
        if($bank->delete()){
            $this->notice::warning('Data Deleted!');
            return redirect()->back();
        }
    }
}