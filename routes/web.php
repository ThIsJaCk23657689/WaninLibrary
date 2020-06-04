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
Route::get('forgetPassword', 'JWTAuthController@showForgetPasswordForm')->name('forgetPassword');


Route::get('/home', 'HomeController@index')->name('home');

// 後臺管理路由
Route::prefix('/backend')->group(function () {
    // 重置密碼
    Route::get('showResetPasswordForm', 'JWTAuthController@showResetPasswordForm')->name('auth.showResetPasswordForm');

    Route::get('/', 'HomeController@backend')->name('backend');

    // 機構管理路由
    Route::resource('/agencies', 'AgencyController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 借閱人管理路由
    Route::resource('/borrowers', 'BorrowerController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 捐贈人管理路由
    Route::resource('/donors', 'DonorController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 書本管理路由
    Route::get('/books/{id}/barcode', 'BookController@printBarcode')->name('books.barcode');
    Route::resource('/books', 'BookController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 借閱管理相關
    Route::get('/circulation', 'BorrowController@circulation')->name('circulation');
    Route::get('/circulation/borrow', 'BorrowController@showBorrowPage')->name('circulation.showBorrowPage');
    Route::resource('/circulation/unreturns', 'UnreturnController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 使用者帳號管理相關路由
    Route::get('/users/usersByName', 'UserController@usersByName');
    Route::resource('/users', 'UserController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 基本資料管理相關路由
    Route::resource('/information', 'InformationController', ['only' => [
        'index', 'edit'
    ]]);

    // 登入紀錄相關
    Route::resource('loginLogs', 'LoginLogController')->only(['index', 'show']);

    // 借閱日誌(logs)相關
    Route::resource('borrowLogs', 'BorrowLogController')->only(['index', 'show']);

    // 近期活動管理路由
    Route::resource('/activities', 'ActivityController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 公告管理路由
    Route::resource('/announcements', 'AnnouncementController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 活動管理路由
    Route::resource('/activities', 'ActivityController', ['only' => [
        'index', 'show', 'create', 'edit'
    ]]);

    // 推薦十本書相關路由
    Route::get('/recommendation','InformationController@recommendation_index')->name('recommendation.index');
    Route::get('/recommendation/edit','InformationController@recommendation_edit')->name('recommendation.edit');

    //匯出資料
    Route::get('/statistic/boughtbooks/export', 'StatisticController@boughtBooksExport')->name('statistic.boughtbooks.export');
    Route::get('/statistic/topbooks/export', 'StatisticController@topBooksExport')->name('statistic.topbooks.export');
    Route::get('/statistic/borrowlogs/export', 'StatisticController@borrowLogsExport')->name('statistic.borrowlogs.export');
    Route::get('/statistic/donated/export', 'StatisticController@DonatedExport')->name('statistic.donated.export');
    Route::get('/statistic/export/index', 'StatisticController@exportIndex')->name('statistic.export.index');
    Route::get('/statistic/chart/index', 'StatisticController@chartIndex')->name('statistic.chart.index');
});
