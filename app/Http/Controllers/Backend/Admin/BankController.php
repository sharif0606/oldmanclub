<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Bank;
use App\Models\User\Client;

class BankController extends Controller
{
    public function bank(){
        $data = Bank::get();
        return view('backend.bank.index',compact('data'));
    }
    public function bank_edit($id){
        $bank = Bank::findOrFail(encryptor('decrypt',$id));
        return view('backend.bank.edit',compact('bank'));
    }
    public function bank_update(Request $request,$id){
        try{
            $bank = Bank::findOrFail(encryptor('decrypt',$id));
            $bank->status = $request->status;
            if($bank->save()){
                $this->notice::success('Data successfully Update');
                return redirect()->route('bank_list');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }
}
