<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $credentials = $req->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        JWTAuth::setToken($token);
        return response()->json(compact('token'));
    }

    public function otherWaylogin(Request $req){
        $this->validateLogin($req);
        $credentials = $this->credentials($req);
        $token = Auth::guard('api')->attempt($credentials);
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
