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
            $user->date_of_birth = $request->dob;
            $user->email=$request->EmailAddress;
            $user->password=Hash::make($request->password);
            if($user->save())
                return redirect('login')->with('success','Successfully Registred');
            else
                return redirect('login')->with('danger','Please try again');
        }catch(Exception $e){
            dd($e);
            return redirect('login')->with('danger','Please try again');;
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
                        return redirect()->route('dashboard')->with('success','Successfully login');
                    }else
                        return redirect()->route('login')->with('error','Your phone number or password is wrong!');
                }else
                    return redirect()->route('login')->with('error','You are not active user. Please contact to authority!');
        }else
                return redirect()->route('login')->with('error','Your phone number or password is wrong!');
        }catch(Exception $e){
            dd($e);
            return redirect()->route('login')->with('error','Your phone number or password is wrong!');
        }
    }
    public function setSession($user){
        return request()->session()->put([
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->name),
                'role_id'=>encryptor('encrypt',$user->role_id),
                'accessType'=>encryptor('encrypt',$user->full_access),
                'role'=>encryptor('encrypt',$user->role->name),
                'roleIdentity'=>encryptor('encrypt',$user->role->identity),
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
