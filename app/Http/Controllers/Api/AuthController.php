<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $req){
        $this->validateLogin($req);
        $credentials = $this->credentials($req);

        $token =JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token){
        return $token ? ['token' => $token] : response()->json([
            'error' => \Lang::get('auth.failed')
        ],400);
    }

    public function logout(){

        Auth::guard('api')->logout();
        return response()->json([], 204);
    }

    public function refresh(){

        $token = Auth::guard('api')->refresh();
        return ['token' => $token];
    }
}
