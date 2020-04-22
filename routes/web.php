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
Route::get('login', 'JWTAuthController@showLoginForm')->name('login');


Route::get('/home', 'HomeController@index')->name('home');

// 後臺管理路由
Route::prefix('/backend')->group(function(){
    Route::get('/', 'HomeController@backend')->name('backend');

    // 機構管理路由
    Route::resource('/agencies', 'AgencyController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 借閱人管理路由
    Route::get('/borrowers/json', 'BorrowerController@getList')->name('borrowers.getList');
    Route::get('/borrowers/{id}/json', 'BorrowerController@getOne')->name('borrowers.getOne');
    Route::resource('/borrowers', 'BorrowerController');

    // 捐贈人管理路由
    Route::get('/donors/json', 'DonorController@getList')->name('donors.getList');
    Route::get('/donors/{id}/json', 'DonorController@getOne')->name('donors.getOne');
    Route::resource('/donors', 'DonorController');

    // 書本管理路由
    Route::get('/books/isbn/{isbn}/', 'BookController@getDataByISBN')->name('books.isbn');
    Route::get('/books/isbn/{isbn}/google', 'BookController@getDataByISBNFromGoogle')->name('books.isbn.google');
    Route::get('/books/json', 'BookController@getList')->name('books.getList');
    Route::get('/books/{id}/json', 'BookController@getOne')->name('books.getOne');
    Route::resource('/books', 'BookController');
    
    // // 捐書人管理路由
    // Route::resource('/donors', 'DonorController', ['only' => [
    //     'index', 'show', 'create', 'edit'
    // ]]);

    // // 借閱人管理路由
    // Route::resource('/borrowers', 'BorrowerController', ['only' => [
    //     'index', 'show', 'create', 'edit'
    // ]]);

    // // 書籍管理路由
    // Route::resource('/books', 'BookController', ['only' => [
    //     'index', 'show', 'create', 'edit'
    // ]]);

    // 使用者帳號管理相關路由
    Route::get('/users/usersByName', 'UserController@usersByName');
    Route::resource('/users', 'UserController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 登入紀錄相關
    Route::resource('loginLogs', 'LoginLogController')->only(['index', 'show']);
});
