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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



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
    // POST api/users   PATCH api/users/{user}  DELETE api/users/{user}
    // postman 測試的話用post 然後 多一個 _method = PATCH
    Route::resource('users', 'UserController')->only(['store', 'update', 'destroy']);


    //借閱者管理相關
    Route::post('activateControll','BorrowerController@activateControll');

});
