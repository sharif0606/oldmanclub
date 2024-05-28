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
        try {
            $company = Company::findOrFail(encryptor('decrypt', $id));
            if ($request->status == 2) {
                // Get the first three letters of the company name
                $companyNameLetters = substr($company->company_name, 0, 3);
                
                // Generate a random four-digit number
                $randomNumber = rand(100000, 999999);

                // Concatenate the company name letters with the random number
                $number = $companyNameLetters .- $randomNumber;
                
                // Check if the generated number already exists
                while ($this->qrCodeExists($number)) {
                    // Regenerate the number until it's unique
                    $randomNumber = rand(1000, 9999);
                    $number = $companyNameLetters .- $randomNumber;
                }
                // Assign the unique number to the company's qrcode attribute
                $company->qrcode = $number;
            }
            $company->status = $request->status;
            if ($company->save()) {
                $this->notice::success('Company Requested Successfully Update');
                return redirect()->route('company_list');
            }
        } catch (Exception $e) {
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }
    public function qrCodeExists($number){
        return Company::where('qrcode', $number)->exists();
    }
    public function show($id)
    {
        $company = Company::findOrFail(encryptor('decrypt',$id));
        return view('backend.company.show',compact('company'));
    }
}