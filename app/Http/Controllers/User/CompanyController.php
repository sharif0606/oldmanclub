<?php

namespace App\Http\Controllers\User;

use App\Models\User\Company;
use App\Models\User\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::where('client_id',currentUserId())->get();
        return view('user.company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::get();
        return view('user.company.create',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $company = new Company;
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
            $company->client_id = currentUserID();
            if($company->save()){
                $this->notice::success('Company Requested Successfully send');
                return redirect()->route('company.index');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findOrFail(encryptor('decrypt',$id));
        return view('user.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
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
            if($company->save()){
                $this->notice::success('Company Requested Successfully send');
                return redirect()->route('company.index');
            }
        }catch(Exception $e){
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
