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

Route::post('test_getBookDataByURL','BookController@getBookDataByURL');

// JWTAuth
Route::post('register', 'JWTAuthController@register');
Route::post('login', 'JWTAuthController@login')->name('api.login');
Route::get('me', 'JWTAuthController@me');
Route::post('logout', 'JWTAuthController@logout')->name('api.logout');
Route::post('forgetPassword', 'JWTAuthController@forgetPassword');

Route::prefix('/backend')->group(function(){
    // 機構管理路由
    Route::get('/agencies/json', 'AgencyController@getList')->name('agencies.getList');
    Route::get('/agencies/{id}/json', 'AgencyController@getOne')->name('agencies.getOne');
    Route::resource('/agencies', 'AgencyController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    //借閱者管理相關
    Route::post('activateControll','BorrowerController@activateControll');
    Route::resource('/borrowers', 'BorrowerController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 捐書人管理路由
    Route::resource('/donors', 'DonorController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    //書籍管理相關
    Route::resource('/books', 'BookController', ['only' => [
        'store', 'update', 'destroy'
    ]]);
});

Route::group(['middleware' => 'auth.jwt'], function () {
    // JWTAuth
    Route::post('refreshToken', 'JWTAuthController@refreshToken');
    Route::post('resetPassword', 'JWTAuthController@resetPassword');

    // 使用者管理 only for admin  except getUserByToken
    Route::get('getUsersByName', 'UserController@getUsersByName');
    Route::get('getUserByToken', 'UserController@getUserByToken');
        // POST api/users   PATCH api/users/{user}  DELETE api/users/{user}
        // postman 測試的話用post 然後 多一個 _method = PATCH
    Route::resource('users', 'UserController')->only(['store', 'update', 'destroy']);

    // 登入紀錄
    Route::get('getLoginLogs', 'LoginLogController@getLoginLogs');
    Route::get('getLoginLogsOrderByASC', 'LoginLogController@getListOrderByASC');
    Route::get('getLoginLogsOrderByUserId', 'LoginLogController@getListOrderByUserId');
    Route::get('getLoginLogsOrderByUserIdASC', 'LoginLogController@getListOrderByUserIdASC');
    Route::get('getLoginLogsById', 'LoginLogController@getLoginLogsById');
    Route::get('getLoginLogsByUserId', 'LoginLogController@getLoginLogsByUserId');
    Route::get('getLoginLogsByUserName', 'LoginLogController@getLoginLogsByUserName');
    Route::get('getLoginLogsByDate', 'LoginLogController@getLoginLogsByDate');
    Route::get('getLoginLogsByMonth', 'LoginLogController@getLoginLogsByMonth');
    Route::get('getLoginLogsByYear', 'LoginLogController@getLoginLogsByYear');
});

// 爬蟲
Route::post('getBookDataByURL','BookController@getBookDataByURL')->name('books.bugurl');
