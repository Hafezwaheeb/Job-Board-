<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // login , refresh , me , logout
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response(['message' => 'Unauthorized access'], 401);
        }
        return response([
            'access_token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
    // refresh function
    public function refresh()
    {
        $token = auth()->guard('api')->refresh();
        return response([
            'access_token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    // me function
    public function me()
    {
            $user = auth()->guard('api')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return response()->json($user);

    }

    // logout function
    public function logout()
    {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }



}
