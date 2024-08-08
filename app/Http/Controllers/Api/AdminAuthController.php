<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AdminAuthController extends Controller
{
    public function adminLogin(Request $request)
    {

        try {
            $status = false;
            $message = 'Invalid Credentials';
            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->username)
                    ->orWhere('contact_no', $request->username);
            })->first();

            if ($user) {
                if ($user->status == 1) {
                    if (Hash::check($request->password, $user->password)) {
                        $status = true;
                        $message = 'Successfully Login';
                        $token = $user->createToken('authToken')->plainTextToken;
                        $user = [
                            'name' => $user->name,
                            'email' => $user->email,
                            'contact_no' => $user->contact_no,
                            'image' => $user->image ? public_path('uploads/client') : '',
                            'role' => $user->role->name
                        ];
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



    public function ForegtPassword()
    {
    }
    public function adminLogout(Request $request)
    {

            // Get the token from the request
            $token = $request->user()->currentAccessToken();
            if ($token) {
                // Revoke the token if it exists
                $token->delete();
                return response()->json([
                    'status' => true,
                    'message' => "Logged out successfully",
                ], 200);
            }
        
    }
}
