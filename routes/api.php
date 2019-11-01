<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'admin','middleware' => ['assign.guard:Admin','jwt.auth', 'cors']],function ()
{
   Route::get('',function(){
       return 'hello';
   });
});

Route::group(['prefix' => 'funcionario','middleware'=>['assign.guard:Funcionario','jwt.auth', 'cors']],function ()
{
    Route::get('',function(){
        return 'funcionario';
    });
});

Route::group(['prefix' => 'cliente', 'middleware' => ['assign.guard:Cliente','jwt.auth', 'cors']],function ()
{
    Route::get('',function(){
        return 'Cliente';
    });
});