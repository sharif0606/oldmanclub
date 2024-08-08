<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use App\Models\User\Client;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

                        return response()->json([
                            'status' => $status,
                            'message' => $message,
                            'user' => $user,
                            'access_token' => $token,
                            'token_type' => 'Bearer',
                        ], 200);
                    } else {
                        $message = 'Incorrect password!';
                    }
                } else {
                    $message = 'You are not an active user. Please contact the authority!';
                }
            } else {
                $message = 'Your username or password is wrong!';
            }
        } catch (Exception $e) {
            $message = 'An error occurred!';
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 401);
    }

    public function registration(Request $request)
    {
        $user = new User();
        $user->name = $request->FullName;
        $user->contact_no = $request->contact_no;
        $user->email = $request->EmailAddress;
        $user->password = Hash::make($request->password);
        $user->role_id = 1;
        if ($user->save()) {
            $token = $user->createToken('auth_token')->accessToken;
        }
    }
    public function a(){
        echo 'ok';
    }
    public function ForegtPassword()
    {
    }
}
