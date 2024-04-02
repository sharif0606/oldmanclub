<?php

namespace App\Http\Controllers\User;

use App\Models\User\Company;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        $company = Company::where('client_id',currentUserId())->get();
        return view('user.company.index',compact('company','client','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.company.create',compact('client','postCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $company = new Company;
            $company->company_name = $request->company_name;
            if($request->hasFile('company_image')){
                $imageName = rand(111,999).time().'.'.$request->company_image->extension();
                $request->company_image->move(public_path('uploads/company'), $imageName);
                $company->company_image=$imageName;
            }
            if($request->hasFile('company_logo')){
                $imageName = rand(111,999).time().'.'.$request->company_logo->extension();
                $request->company_logo->move(public_path('uploads/company'), $imageName);
                $company->company_logo=$imageName;
            }
            if ($request->hasFile('company_document')) {
                $documentNames = []; // Array to store document file names
                foreach ($request->file('company_document') as $file) {
                    $validator = Validator::make(['company_document' => $file], [
                        'company_document' => 'required|mimes:jpg,png,pdf,doc,docx|max:2048'
                    ]);

                    if ($validator->fails()) {
                        throw new \Exception('Invalid file format or size');
                    }

                    $imageName = rand(111, 999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/company'), $imageName);
                    $documentNames[] = $imageName;
                }
                $company->company_document = implode(',', $documentNames);
            }
            $company->contact_no = $request->contact_no;
            $company->email = $request->email;
            $company->phone_number = $request->phone_number;
            $company->address = $request->address;
            $company->city = $request->city;
            $company->state = $request->state;
            $company->zip_code = $request->zip_code;
            $company->description = $request->description;
            // $company->contact_person_name = $request->contact_person_name;
            // $company->contact_person_email = $request->contact_person_email;
            // $company->contact_person_phone = $request->contact_person_phone;
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
    public function show($id)
    {
        $client = Client::find(currentUserId());
        $postCount = Post::where('client_id', currentUserId())->count();
        $company = Company::findOrFail(encryptor('decrypt',$id));
        return view('user.company.show',compact('company','client','postCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find(currentUserId());
        $company = Company::findOrFail(encryptor('decrypt',$id));
        $postCount = Post::where('client_id', currentUserId())->count();
        return view('user.company.edit',compact('company','client','postCount'));
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
                $request->company_logo->move(public_path('uploads/company'), $imageName);
                $company->company_logo=$imageName;
            }
            if($request->hasFile('company_image')){
                $imageName = rand(111,999).time().'.'.$request->company_image->extension();
                $request->company_image->move(public_path('uploads/company'), $imageName);
                $company->company_image=$imageName;
            }
            if ($request->hasFile('company_document')) {
                $documentNames = []; // Array to store document file names

                foreach ($request->file('company_document') as $file) {
                    $validator = Validator::make(['company_document' => $file], [
                        'company_document' => 'required|mimes:jpg,png,pdf,doc,docx|max:2048'
                    ]);

                    if ($validator->fails()) {
                        throw new \Exception('Invalid file format or size');
                    }

                    $imageName = rand(111, 999) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/company'), $imageName);
                    $documentNames[] = $imageName;
                }

                // Append new document names to the existing ones
                $existingDocuments = $company->company_document ? explode(',', $company->company_document) : [];
                $company->company_document = implode(',', array_merge($existingDocuments, $documentNames));
            }
            $company->contact_no = $request->contact_no;
            $company->email = $request->email;
            $company->phone_number = $request->phone_number;
            $company->address = $request->address;
            $company->city = $request->city;
            $company->state = $request->state;
            $company->zip_code = $request->zip_code;
            $company->description = $request->description;
            // $company->contact_person_name = $request->contact_person_name;
            // $company->contact_person_email = $request->contact_person_email;
            // $company->contact_person_phone = $request->contact_person_phone;
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
    public function destroy($id)
    {
        $company = Company::findOrFail(encryptor('decrypt',$id));
        if($company->delete()){
            $this->notice::warning('Data Deleted!');
            return redirect()->back();
        }
    }
}
