<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    public function index(Request $req){
        $token = JWTAuth::getToken();
        $decode = JWTAuth::decode($token);
        $email = $decode['email'];
        $users = DB::table('users')->join('tipo_users', 'users.tipo_user_id', '=', 'tipo_users.id')->where('email', '=', $email)->get();    
        return response()->json(['user' => $users]);
    }
}
