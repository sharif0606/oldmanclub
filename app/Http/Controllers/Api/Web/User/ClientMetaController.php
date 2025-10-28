<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Http\Controllers\Api\BaseController;
use App\Http\Helpers\SanitizationHelper;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User\Client;
use App\Models\ClientWork;
use App\Models\ClientCategory;
use App\Models\ClientEducation;
use App\Models\Language;
use App\Models\User\ClientLanguage;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Validator;

class ClientMetaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function categorylist()
    {
        $data = Category::all();
        if ($data)
        return $this->sendResponse($data, 'Data fetched successfully');
        else
        return $this->sendError('No data found', [], 202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCategory(Request $request)
    {
        // Sanitize the categories input
        $sanitizedCategories = SanitizationHelper::sanitizeCategoryIds($request->categories);
        
        if (!empty($sanitizedCategories)) {
            // Delete existing categories for this client
            ClientCategory::where('client_id', Auth::user()->id)->delete();
            
            // Insert sanitized categories
            foreach ($sanitizedCategories as $categoryId) {
                ClientCategory::create([
                    'client_id' => Auth::user()->id, 
                    'category_id' => $categoryId,
                    'status' => 1
                ]);
            }
        }
        
        $client = Client::with('categories:id,name')->find(Auth::user()->id);
        return $this->sendResponse($client, 'Category added successfully');
    }

    public function storeEducation(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'institution' => 'required',
                'start_date' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            
            $education=ClientEducation::create([
                'institution' => SanitizationHelper::sanitizeString($request->institution,255),
                'client_id' => Auth::user()->id,
                'field_of_study' => SanitizationHelper::sanitizeString($request->field_of_study,500),
                'degree' => SanitizationHelper::sanitizeString($request->degree,255),
                'start_date' => SanitizationHelper::sanitizeDate($request->start_date),
                'end_date' => SanitizationHelper::sanitizeDate($request->end_date),
                'description' => SanitizationHelper::sanitizeString($request->description,3000),
                'status' => $request->status ?? 1
            ]);
                    
             return $this->sendResponse($education, 'Education added successfully');
        
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateEducation(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'institution' => 'required',
                'start_date' => 'required',
                'id' => 'required|exists:client_education,id,client_id,'.Auth::user()->id,
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $education = ClientEducation::where('id', $request->id)->where('client_id', Auth::user()->id)->first();
            if (!$education) {
                return $this->sendError('Education not found', [], 202);
            }
            $education->institution = SanitizationHelper::sanitizeString($request->institution,255);
            $education->field_of_study = SanitizationHelper::sanitizeString($request->field_of_study,500);
            $education->degree = SanitizationHelper::sanitizeString($request->degree,255);
            $education->start_date = SanitizationHelper::sanitizeDate($request->start_date);
            $education->end_date = SanitizationHelper::sanitizeDate($request->end_date);
            $education->description = SanitizationHelper::sanitizeString($request->description,3000);
            $education->status = $request->status ?? 1;
            $education->save();
            return $this->sendResponse($education, 'Education updated successfully');

        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteEducation(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:client_education,id,client_id,'.Auth::user()->id,
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            
            ClientEducation::where('id', SanitizationHelper::sanitizeInteger($request->id,1))->where('client_id', Auth::user()->id)->delete();
            return $this->sendResponse([], 'Education deleted successfully');
            
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function storeWork(Request $request){
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'position' => 'required',
                'start_date' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $work=ClientWork::create([
                'client_id' => Auth::user()->id,
                'company_name' => SanitizationHelper::sanitizeString($request->company_name,255),
                'position' => SanitizationHelper::sanitizeString($request->position,255),
                'start_date' => SanitizationHelper::sanitizeDate($request->start_date),
                'end_date' => SanitizationHelper::sanitizeDate($request->end_date),
                'description' => SanitizationHelper::sanitizeString($request->description,3000),
                'status' => $request->status ?? 1
            ]);
            return $this->sendResponse($work, 'Work added successfully');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updateWork(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'position' => 'required',
                'start_date' => 'required',
                'id' => 'required|exists:client_works,id,client_id,'.Auth::user()->id,
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $work = ClientWork::where('id', $request->id)->where('client_id', Auth::user()->id)->first();
            if (!$work) {
                return $this->sendError('Work not found', [], 202);
            }
            $work->company_name = SanitizationHelper::sanitizeString($request->company_name,255);
            $work->position = SanitizationHelper::sanitizeString($request->position,255);
            $work->start_date = SanitizationHelper::sanitizeDate($request->start_date);
            $work->end_date = SanitizationHelper::sanitizeDate($request->end_date);
            $work->description = SanitizationHelper::sanitizeString($request->description,3000);
            $work->status = $request->status ?? 1;
            $work->save();
            return $this->sendResponse($work, 'Work updated successfully');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteWork(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:client_works,id,client_id,'.Auth::user()->id,
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            ClientWork::where('id', SanitizationHelper::sanitizeInteger($request->id,1))->where('client_id', Auth::user()->id)->delete();
            return $this->sendResponse([], 'Work deleted successfully');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function storeLanguage(Request $request)
    {
        try {
            if($request->has('language_name') && $request->language_name != ''){
                $language=Language::updateOrCreate(['name' => SanitizationHelper::sanitizeString($request->language_name,100)],['status' => 1]);
                $language_id=$language->id;
            }else if($request->has('language_id') && $request->language_id != ''){
                $language_id=SanitizationHelper::sanitizeInteger($request->language_id,1);
            }else{
                return $this->sendError('Language not found', [], 202);
            }
            $clientLanguage = ClientLanguage::updateOrCreate([
                'client_id' => Auth::user()->id,
                'language_id' => $language_id
            ],[
                'status' => $request->status ?? 1
            ]);
            return $this->sendResponse($clientLanguage, 'Language saved successfully');
        }
        catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function deleteLanguage(Request $request)
    {
        try {
            //validation
            $validator = Validator::make($request->all(), [
                'language_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            ClientLanguage::where('language_id', SanitizationHelper::sanitizeInteger($request->language_id,1))->where('client_id', Auth::user()->id)->delete();
            return $this->sendResponse([], 'Language deleted successfully');
        }
        catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getLanguages()
    {
        try {
            $languages = Language::all();
            return $this->sendResponse($languages, 'Languages fetched successfully');
        }
        catch (Exception $e) {
            return $this->sendError('Unauthorised.', [
                'message' => 'Please try again',
                'error' => $e->getMessage()
            ]);
        }
    }
}
