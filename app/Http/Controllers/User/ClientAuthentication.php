<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Models\Backend\NfcCard;
use App\Models\Backend\NfcField;
use App\Models\Backend\NfcDesign;
use App\Models\Backend\NfcInformation;

use App\Http\Requests\User\SignupRequest;
use App\Http\Requests\User\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
use Validator;
use DB;

class ClientAuthentication extends Controller
{

    public function signUpForm()
    {
        return view('user.authentication.register');
    }


    public function signUpStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            // 'middle_name' => 'required',
            // 'last_name' => 'required',
            //'dob' => 'required',
            'contact_no' => 'required|unique:clients,contact_no',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|confirmed',
        ], [
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);
        if ($validator->fails()) {
            //return response()->json(['success' => false, 'errors' => $validator->errors()]);//for json
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $user = new Client;
            $user->fname = $request->fname;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->contact_no = $request->contact_no;
            $user->dob = $request->dob;
            $user->email = $request->email;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->country_id = $request->country_id;
            $user->city_id = $request->city_id;
            $user->state_id = $request->state_id;
            $user->zip_code = $request->zip_code;
            $user->status = 1;
            $user->password = Hash::make($request->password);



            if ($user->save()) {

                $nfc = new NfcCard;
                $nfc->client_id = $user->id;
                $nfc->created_by = $user->id;
                if ($nfc->save()) {
                    /* Insert Data To Nfc Information */
                    $nfc_info = new NfcInformation;
                    $nfc_info->nfc_card_id = $nfc->id;
                    $nfc->client_id = $user->id;
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
                $this->setSession($user);
                $this->notice::success('Successfully Login');
                return redirect()->route('clientdashboard')->with('success', 'Successfully login');
            } else
                $this->notice::error('something wrong! Please try again');
            return redirect()->route('clientlogin')->with('danger', 'Please try again');
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            $this->notice::error('something wrong! Please try again');
            return redirect()->route('clientlogin')->with('danger', 'Please try again');;
        }
    }
    public function signInForm()
    {
        return view('user.authentication.login');
    }
    public function signInCheck(SigninRequest $request)
    {
        try {
            $user = Client::where('email', $request->username)->first();
            if ($user) {
                if ($user->status == 1) {
                    if (Hash::check($request->password, $user->password)) {
                        $this->setSession($user);
                        $this->notice::success('Successfully Login');
                        return redirect()->route('clientdashboard')->with('success', 'Successfully login');
                    } else
                        $this->notice::error('Your User name or password is wrong!');
                    return redirect()->route('clientlogin')->with('error', 'Your phone number or password is wrong!');
                } else
                    $this->notice::error('You are not active user. Please contact to authority!');
                return redirect()->route('clientlogin');
            } else
                $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('clientlogin');
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('clientlogin');
        }
    }
    public function setSession($user)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $user->id),
                'userName' => $user->middle_name,
                //'accessType' => encryptor('encrypt', $user->full_access),
                //'image' => $user->image ?? 'no-image.png'
            ]
        );
    }

    public function singOut()
    {
        //request()->session()->flush();
        request()->session()->forget(['userId', 'userName']);
        return redirect()->route('clientlogin')->with('danger', 'Succfully Logged Out');
    }
}
