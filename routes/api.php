<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::name('api.login')->post('login', 'Api\AuthController@login');
// Route::post('refresh', 'Api\AuthController@refresh');

// Route::group(['middleware' => 'auth:api'], function (){
//     Route::get('users', function(){
//         return \App\User::all();
//     });
//     Route::post('logout', 'Api\AuthController@logout');
// });

Route::post('login','Api\AuthController@login');
Route::get('logout','Api\AuthController@logout');


Route::group(['prefix' => 'admin','middleware' => 'assign.guard'], function(){
   Route::name('admin')->get('','Api\AdminController@index');
});

Route::group(['prefix' => 'funcionario', 'middleware' => 'assign.guard'], function(){
    Route::name('funcionario')->get('',function(){
        return 'Hello World';
    });
});

Route::group(['prefix' => 'cliente', 'middleware' => 'assign.guard'],function (){
    Route::name('cliente')->get('',function(){
        return 'Hello Cliente';
    });
});
