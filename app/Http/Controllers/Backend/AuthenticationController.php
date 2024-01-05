<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Backend\Role;
use App\Models\Backend\User;
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthenticationController extends Controller
{
    public function signUpForm(){
        return view('backend.authentication.register');
    }

    public function signUpStore(SignupRequest $request){
        try{
            $user=new User;
            $user->name_en=$request->FullName;
            $user->contact_no_en=$request->contact_no_en;
            $user->email=$request->EmailAddress;
            $user->password=Hash::make($request->password);
            // $user->role_id=1;
            if($user->save()){
                $this->notice::success('Successfully Registered');
                return redirect('login')->with('success','Successfully Registred');
            }else
                $this->notice::error('something wrong! Please try again');
                return redirect('login');
        }catch(Exception $e){
            dd($e);
            $this->notice::error('something wrong! Please try again');
            return redirect('login');
        }

    }

    public function signInForm(){
        return view('backend.authentication.login');
    }

    public function signInCheck(SigninRequest $request){
        try{
            $user=User::where('contact_no_en',$request->username)
                        ->orWhere('email',$request->username)->first();
            if($user){
                if($user->status==1){
                    if(Hash::check($request->password , $user->password)){
                        $this->setSession($user);
                        $this->notice::success('Successfully Login');
                        return redirect()->route('dashboard')->with('success','Successfully login');
                    }else
                        $this->notice::error('Your User name or password is wrong!');
                        return redirect()->route('login')->with('error','Your phone number or password is wrong!');
                }else
                    $this->notice::error('You are not active user. Please contact to authority!');
                    return redirect()->route('login');
        }else
            $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('login');
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Your User name or password is wrong!');
            return redirect()->route('login');
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
