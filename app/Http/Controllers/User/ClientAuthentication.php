<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Client;
use App\Http\Requests\User\SignupRequest;
use App\Http\Requests\User\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class ClientAuthentication extends Controller
{
    
    public function signUpForm(){
        return view('user.authentication.register');
    }

    public function signUpStore(SignupRequest $request){
        try{
            $user=new Client;
            $user->first_name_en=$request->fname_en;
            $user->middle_name_en=$request->mname_en;
            $user->last_name_en=$request->lname_en;
            $user->contact_en=$request->ContactNumber_en;
            $user->date_of_birth = $request->dob;
            $user->email=$request->EmailAddress;
            $user->address_line_1 = $request->PresentAddress;
            $user->address_line_2 = $request->ParmanentAddress;
            $user->country= $request->country;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip_code = $request->zp;
            $user->password=Hash::make($request->password);
            if($user->save()){
                $this->notice::success('Successfully Registered');
                return redirect()->route('clientlogin')->with('success','Successfully Registred');
            }else
                $this->notice::error('something wrong! Please try again');
                return redirect->route('clientlogin')->with('danger','Please try again');
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
                'userName'=>encryptor('encrypt',$user->name),
                'accessType'=>encryptor('encrypt',$user->full_access),
                'language'=>encryptor('encrypt',$user->language),
                'image'=>$user->image ?? 'no-image.png'
            ]
        );
    }

    public function singOut(){
        request()->session()->flush();
        return redirect('login')->with('danger','Succfully Logged Out');
    }

}
