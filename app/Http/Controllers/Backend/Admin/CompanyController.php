<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Event;
use App\Models\User\Company;
use App\Models\User\Client;

class CompanyController extends Controller
{
    public function company(){
        $data = Company::get();
        return view('backend.company.index',compact('data'));
    }
    public function company_edit($id){
        $company = Company::findOrFail(encryptor('decrypt',$id));
        return view('backend.company.edit',compact('company'));
    }
    public function company_update(Request $request,$id){
        try{
            // dd($request->all());
            $company = Company::findOrFail(encryptor('decrypt',$id));
            $company->company_name = $request->company_name;
            if($request->hasFile('company_logo')){
                $imageName = rand(111,999).time().'.'.$request->company_logo->extension();
                $request->company_logo->move(public_path('uploads/Company'), $imageName);
                $company->company_logo=$imageName;
            }
            $company->contact_no = $request->contact_no;
            $company->email = $request->email;
            $company->phone_number = $request->phone_number;
            $company->address = $request->address;
            $company->city = $request->city;
            $company->state = $request->state;
            $company->zip_code = $request->zip_code;
            $company->description = $request->description;
            $company->status = $request->status;
            if($company->save()){
                $this->notice::success('Company Requested Successfully Update');
                return redirect()->route('company_list');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }
}
