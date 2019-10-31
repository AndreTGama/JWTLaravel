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

    /**
     * login
     *
     * @param  mixed $req
     *
     * @return void
     */
    public function login(Request $req){
        $this->validateLogin($req);
        $credentials = $this->credentials($req);

        $token =JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    /**
     * responseToken
     *
     * @param  mixed $token
     *
     * @return void
     */
    private function responseToken($token){
        return $token ? ['token' => $token] : response()->json([
            'error' => \Lang::get('auth.failed')
        ],400);
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout(){
        Auth::guard('api')->logout();
        return response()->json([], 204);
    }

    /**
     * refresh
     *
     * @return void
     */
    public function refresh(){
        $token = Auth::guard('api')->refresh();
        return ['token' => $token];
    }
}
