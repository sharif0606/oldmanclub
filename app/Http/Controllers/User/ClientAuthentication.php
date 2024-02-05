<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Http\Requests\User\SignupRequest;
use App\Http\Requests\User\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
use Validator;
class ClientAuthentication extends Controller
{
    
    public function signUpForm(){
        return view('user.authentication.register');
    }


    public function signUpStore(Request $request){
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            //'dob' => 'required',
            'contact_no' => 'required|unique:clients,contact_no',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:8|confirmed',
        ],[
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);
        if ($validator->fails()) {
            //return response()->json(['success' => false, 'errors' => $validator->errors()]);//for json
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $user=new Client;
            $user->fname=$request->fname;
            $user->middle_name=$request->middle_name;
            $user->last_name=$request->last_name;
            $user->contact_no=$request->contact_no;
            $user->dob = $request->dob;
            $user->email=$request->email;
            $user->address_line_1 = $request->address_line_1;
            $user->address_line_2 = $request->address_line_2;
            $user->country_id= $request->country_id;
            $user->city_id = $request->city_id;
            $user->state_id = $request->state_id;
            $user->zip_code = $request->zip_code;
            $user->status = 1;
            $user->password=Hash::make($request->password);

            if($user->save()){
                $this->notice::success('Successfully Registered');
                return redirect()->route('clientlogin')->with('success','Successfully Registred');
            }else
                $this->notice::error('something wrong! Please try again');
                return redirect()->route('clientlogin')->with('danger','Please try again');
        }catch(Exception $e){
            dd($e);
            $this->notice::error('something wrong! Please try again');
            return redirect()->route('clientlogin')->with('danger','Please try again');;
        }

    }
    public function signInForm(){
        return view('user.authentication.login');
    }
    public function signInCheck(SigninRequest $request){
        try{
            $user=Client::where('email',$request->username)->first();
            if($user){
                if($user->status==1){
                    if(Hash::check($request->password , $user->password)){
                        $this->setSession($user);
                        $this->notice::success('Successfully Login');
                        return redirect()->route('clientdashboard')->with('success','Successfully login');
                    }else
                        $this->notice::error('Your User name or password is wrong!');
                        return redirect()->route('clientlogin')->with('error','Your phone number or password is wrong!');
                }else
                    $this->notice::error('You are not active user. Please contact to authority!');
                    return redirect()->route('clientlogin');
        }else
            $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('clientlogin');
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('clientlogin');
        }
    }
    public function setSession($user){
        return request()->session()->put([
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->first_name_en),
                'accessType'=>encryptor('encrypt',$user->full_access),
                'language'=>encryptor('encrypt',$user->language),
                'image'=>$user->image ?? 'no-image.png'
            ]
        );
    }

    public function singOut(){
        request()->session()->flush();
        return redirect()->route('clientlogin')->with('danger','Succfully Logged Out');
    }
}
