<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\User\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcInformation;
use App\Models\Backend\NfcDesign;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AuthController extends BaseController
{

    public function test()
    {
        return response()->json(['message' => 'Success']);
    }
    
    public function clientLogin(Request $request)
    {
        try {
            $status = false;
            $message = 'Invalid Credentials';
            $user = Client::where(function ($query) use ($request) {
                $query->where('email', $request->username)
                    ->orWhere('contact_no', $request->username);
            })->first();
            
            if ($user) {
                if ($user->status == 1) {
                    if (Hash::check($request->password, $user->password)) {
                        $status = true;
                        $message = 'Successfully Login';
                        $token = $user->createToken('authToken')->plainTextToken;

                        return $this->sendResponse([
                            'status' => $status,
                            'message' => $message,
                            'user' => $user,
                            'access_token' => $token,
                            'token_type' => 'Bearer',
                        ], 'Successfully Login');
                    } else {
                        return $this->sendError('Unauthorised.', ['error'=>'Incorrect password!']);
                    }
                } else {
                    return $this->sendError('Unauthorised.', ['error'=>'You are not an active user. Please contact the authority!']);
                }
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'Your username or password is wrong!']);
            }
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error'=>'An error occurred!']);
        }
    }

    public function signUpStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'contact_or_email' => 'required', // Add validation for the input field
            'password' => 'required|confirmed',
            'fname' => 'required',
            'last_name' => 'required',
            //'dob' => 'required|date',
            'birthDay' => 'required|integer|between:1,31',
            'birthMonth' => 'required|integer|between:1,12',
            'birthYear' => 'required|integer|between:1900,' . date('Y'),
        ], [
            'contact_or_email.required' => 'The email or contact field is required.',
            'password.required' => 'The password field is required.',
            'birthDay.required' => 'The birth day field is required.',
            'birthDay.integer' => 'The birth day must be an integer.',
            'birthDay.between' => 'The birth day must be between 1 and 31.',
            'birthMonth.required' => 'The birth month field is required.',
            'birthMonth.integer' => 'The birth month must be an integer.',
            'birthMonth.between' => 'The birth month must be between 1 and 12.',
            'birthYear.required' => 'The birth year field is required.',
            'birthYear.integer' => 'The birth year must be an integer.',
            'birthYear.between' => 'The birth year must be between 1900 and ' . date('Y') . '.',
            'unique_contact_or_email' => 'The email or contact already exists.',
        ]);

        // Custom validation rule to check if either email or contact number already exists
        $validator->addExtension('unique_contact_or_email', function ($attribute, $value, $parameters, $validator) {
            $existsByEmail = Client::where('email', $value)->exists();
            $existsByContact = Client::where('contact_no', $value)->exists();
            return !$existsByEmail && !$existsByContact;
        });

        $validator->sometimes('contact_or_email', 'unique_contact_or_email', function ($input) {
            return true;
        });

        // Custom validation rule to check if fname, last_name, and dob are the same
        $validator->addExtension('same_client', function ($attribute, $value, $parameters, $validator) use ($request) {
            $dob = $request->birthYear . '-' . str_pad($request->birthMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->birthDay, 2, '0', STR_PAD_LEFT);
            return Client::where([
                ['fname', '=', $request->fname],
                ['last_name', '=', $request->last_name],
                ['dob', '=', $dob],
            ])->doesntExist();
        });

        $validator->sometimes(['fname', 'last_name', 'birthDay', 'birthMonth', 'birthYear'], 'same_client', function ($input) {
            return !empty($input->fname) && !empty($input->last_name) && !empty($input->birthDay) && !empty($input->birthMonth) && !empty($input->birthYear);
        });


        if ($validator->fails()) {

            // Construct dob from the birthDay, birthMonth, and birthYear
            $dob = $request->birthYear . '-' . str_pad($request->birthMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->birthDay, 2, '0', STR_PAD_LEFT);

            // Check if the validation error is due to the same_client rule
            if (
                $validator->errors()->has('fname') &&
                $validator->errors()->has('last_name') &&
                $validator->errors()->has('birthDay') &&
                Client::where([
                    ['fname', '=', $request->fname],
                    ['last_name', '=', $request->last_name],
                    ['dob', '=', $dob],
                ])->exists()
            ) {
                // Redirect with a custom message
                return $this->sendError('Unauthorised.', ['error'=>'Client with the same first name, last name, and date of birth already exists.']);
            }

            return $this->sendError('Validation errors occurred.', ['error'=>'Validation errors occurred.', 'errors' => $validator->errors()]);
        }
        DB::beginTransaction();
        try {
            $user = new Client;
            $user->fname = $request->fname;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            // Check if contact_or_email contains an email address
            if (filter_var($request->contact_or_email, FILTER_VALIDATE_EMAIL)) {
                // If it's an email, assign it to the email attribute
                $user->email = $request->contact_or_email;
            } else {
                // If it's not an email (assuming it's a contact number), assign it to the contact_no attribute
                $user->contact_no = $request->contact_or_email;
            }
            $user->dob = $request->birthYear . '-' . $request->birthMonth . '-' . $request->birthDay;
            // $user->address_line_1 = $request->address_line_1;
            // $user->address_line_2 = $request->address_line_2;
            // $user->country_id = $request->country_id;
            // $user->city_id = $request->city_id;
            // $user->state_id = $request->state_id;
            // $user->zip_code = $request->zip_code;
            $user->status = 1;
            $user->password = Hash::make($request->password);

            // Generate username based on middle and last name
            $username = strtolower(substr($request->fname, 0, 1) . $request->last_name);
            $count = Client::where('username', 'like', $username . '%')->count();
            if ($count > 0) {
                $username .= $count + 1;
            }
            $user->username = $username;

            if ($user->save()) {

                $nfc = new NfcCard;
                $nfc->client_id = $user->id;
                $nfc->card_name = "Personal Card";
                $nfc->created_by = $user->id;
                if ($nfc->save()) {
                    /* Insert Data To Nfc Information */
                    $nfc_info = new NfcInformation;
                    $nfc_info->nfc_card_id = $nfc->id;
                    $nfc_info->first_name = $request->fname;
                    $nfc_info->last_name = $request->last_name;
                    $nfc_info->created_by = $user->id;

                    if ($nfc_info->save()) {
                        /* Insert Data To Nfc Design */
                        $nfc_design = new NfcDesign;
                        $nfc_design->nfc_card_id = $nfc->id;
                        $nfc_design->design_card_id = 1;
                        $nfc_design->created_by = $user->id;
                        $nfc_design->save();
                    }
                }

                // Commit the transaction if all operations are successful
                DB::commit();
                $token = $user->createToken('authToken')->plainTextToken;
                return $this->sendResponse([
                    'status' => true,
                    'message' => 'Successfully Login',
                    'user' => $user,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ], 'Successfully Login');
            } else
                return $this->sendError('Unauthorised.', ['error'=>'Something wrong! Please try again']);
        } catch (Exception $e) {
            DB::rollback();
           // dd($e);
            return $this->sendError('Unauthorised.', ['error'=>'Something wrong! Please try again']);
        }
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:clients',
            ],
            [
                'email.exists' => 'The email address does not exists.', // Customize the error message
            ]
        );

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()->addMinutes(20)
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->from('oldclubman@quickpicker.xyz', 'Old Man Club');
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return $this->sendResponse([], 'We have e-mailed your password reset link!');
    }
   
    public function submitResetPasswordForm(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|exists:clients',
            'password' => 'required|string|confirmed'/*min:6|*/,
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->where('created_at', '>=', Carbon::now())
            ->first();
        
        if (!$updatePassword) {
            return $this->sendError('Unauthorised.', ['error'=>'Invalid token!']);
        }

        $user = Client::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return $this->sendResponse([], 'Your password has been changed!');
    }

    public function signOut()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return $this->sendResponse([], 'Successfully logged out');
    }
}
