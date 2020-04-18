<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 後臺管理路由
Route::prefix('/backend')->group(function(){
    Route::get('/', 'HomeController@backend')->name('backend');

    // 機構管理路由
    Route::get('/agencies/json', 'AgencyController@getList')->name('agencies.getList');
    Route::get('/agencies/{id}/json', 'AgencyController@getOne')->name('agencies.getOne');
    Route::resource('/agencies', 'AgencyController');
});
