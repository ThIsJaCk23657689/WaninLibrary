<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// JWTAuth
Route::post('login', 'JWTAuthController@login');
Route::post('register', 'JWTAuthController@register');
Route::post('forgetPassword', 'JWTAuthController@forgetPassword');

Route::group(['middleware' => 'auth.jwt'], function () {

    // JWTAuth
    Route::get('logout', 'JWTAuthController@logout');
    Route::post('refreshToken', 'JWTAuthController@refreshToken');
    Route::post('resetPassword', 'JWTAuthController@resetPassword');

    // Users only for admin  except getUserByToken
    Route::get('getUsersByName', 'UserController@getUsersByName');
    Route::get('getUserByToken', 'UserController@getUserByToken');
    Route::post('store', 'UserController@store');
    Route::patch('update', 'UserController@update');
    Route::delete('destroy', 'UserController@destroy');
});
