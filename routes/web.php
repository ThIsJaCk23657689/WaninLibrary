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
Route::post('barcodeCreate','BookController@barcodeCreate');

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

    // 借閱人管理路由
    Route::get('/borrowers/json', 'BorrowerController@getList')->name('borrowers.getList');
    Route::get('/borrowers/{id}/json', 'BorrowerController@getOne')->name('borrowers.getOne');
    Route::resource('/borrowers', 'BorrowerController');

    // 捐贈人管理路由
    Route::get('/donors/json', 'DonorController@getList')->name('donors.getList');
    Route::get('/donors/{id}/json', 'DonorController@getOne')->name('donors.getOne');
    Route::resource('/donors', 'DonorController');

    // 書本管理路由
    Route::get('/books/json', 'BookController@getList')->name('books.getList');
    Route::get('/books/{id}/json', 'BookController@getOne')->name('books.getOne');
    Route::resource('/books', 'BookController');

    // 使用者帳號管理相關路由
    Route::resource('/users', 'UserController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);
    Route::get('/users/usersByName', 'UserController@usersByName');
});
