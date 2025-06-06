<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Company;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

class CompanyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::where('client_id',Auth::user()->id)->get();
        return $this->sendResponse([
            'company' => $company,
        ], 'Company List');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_document' => 'nullable|array',
                'company_document.*' => 'nullable|mimes:jpg,png,pdf,doc,docx|max:2048',
                'contact_no' => 'required|string|max:255|unique:companies,contact_no',
                'email' => 'required|email|max:255|unique:companies,email',
                'phone_number' => 'required|string|max:255|unique:companies,phone_number',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error!', $validator->errors());
            }
            $company = new Company;
            $company->company_name = $request->company_name;
            $folder = date('Y') . '/' . date('m');
            $uploadPath = public_path('uploads/company/' . $folder);
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            if($request->hasFile('company_image')){
                $imageName = rand(111,999).time().'.'.$request->company_image->extension();
                $request->company_image->move($uploadPath, $imageName);
                $company->company_image=$imageName;
            }
            if($request->hasFile('company_logo')){
                $imageName = rand(111,999).time().'.'.$request->company_logo->extension();
                $request->company_logo->move($uploadPath, $imageName);
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
                    $file->move($uploadPath, $imageName);
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
            $company->client_id = Auth::user()->id;
            if($company->save()){
                return $this->sendResponse($company, 'Company created successfully');
            }
        }catch(Exception $e){
            return $this->sendError('Something Wrong! Please try again');
        }
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'company_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_document' => 'nullable|array',
                'company_document.*' => 'nullable|mimes:jpg,png,pdf,doc,docx|max:2048',
                'contact_no' => 'required|string|max:255|unique:companies,contact_no,'.$id,
                'email' => 'required|email|max:255|unique:companies,email,'.$id,
                'phone_number' => 'required|string|max:255|unique:companies,phone_number,'.$id,
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error!', $validator->errors());
            }
            $company = Company::find($id);
            $company->company_name = $request->company_name;
            $folder = date('Y') . '/' . date('m');
            $uploadPath = public_path('uploads/company/' . $folder);
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            if($request->hasFile('company_logo')){
                $imageName = rand(111,999).time().'.'.$request->company_logo->extension();
                $request->company_logo->move($uploadPath, $imageName);
                $company->company_logo=$imageName;
            }
            if($request->hasFile('company_image')){
                $imageName = rand(111,999).time().'.'.$request->company_image->extension();
                $request->company_image->move($uploadPath, $imageName);
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
                    $file->move($uploadPath, $imageName);
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
                return $this->sendResponse($company, 'Company updated successfully');
            }
        }catch(Exception $e){
            return $this->sendError('Something Wrong! Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if($company->delete()){
            return $this->sendResponse($company, 'Company deleted successfully');
        }else{
            return $this->sendError('Something Wrong! Please try again');
        }
    }
}
