<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function clientLogin():JsonResponse
    {
        return response()->json([
           'message' => 'Client login'
        ]);
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

    public function ForegtPassword()
    {
    }
}
