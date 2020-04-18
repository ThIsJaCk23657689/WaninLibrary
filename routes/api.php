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

Route::post('login', 'JWTAuthController@login');
Route::post('register', 'JWTAuthController@register');
Route::post('forgetPassword', 'JWTAuthController@forgetPassword');

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::get('logout', 'JWTAuthController@logout');
    Route::post('refreshToken', 'JWTAuthController@refreshToken');
    Route::post('resetPassword', 'JWTAuthController@resetPassword');

});
