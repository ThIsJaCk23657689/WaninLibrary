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
Route::post('refreshToken', 'JWTAuthController@refreshToken');

Route::prefix('/backend')->group(function(){
    //JWT
    Route::post('resetPassword', 'JWTAuthController@resetPassword')->name('auth.resetPassword');


    // 單位管理路由
    Route::get('/agencies/json', 'AgencyController@getList')->name('agencies.getList');
    Route::get('/agencies/{id}/json', 'AgencyController@getOne')->name('agencies.getOne');
    Route::resource('/agencies', 'AgencyController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 借閱者管理相關路由
    Route::post('/borrowers/activate','BorrowerController@activate');
    Route::get('/borrowers/json', 'BorrowerController@getList')->name('borrowers.getList');
    Route::get('/borrowers/{id}/json', 'BorrowerController@getOne')->name('borrowers.getOne');
    Route::get('/borrowers/filter', 'BorrowerController@filter')->name('borrowers.filter');
    Route::resource('/borrowers', 'BorrowerController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 基本資料相關路由
    Route::resource('/information', 'InformationController', ['only' => [
        'update'
    ]]);
    Route::get('/information/getFirst','InformationController@getFirst')->name('information.getFirst');

    // 推薦十本好書相關路由
    Route::patch('/recommendation/update','InformationController@recommendation_update')->name('recommendation.update');
    Route::get('/recommendation/getFirst','InformationController@recommendation_getFirst')->name('recommendation.getFirst');
    Route::get('/recommendation/getBooksByName','InformationController@recommendation_getBooksByName')->name('recommendation.getBooksByName');

    // 捐書人管理路由
    Route::get('/donors/json', 'DonorController@getList')->name('donors.getList');
    Route::get('/donors/getDonorsByName', 'DonorController@getDonorsByName')->name('donors.getDonorsByName');
    Route::get('/donors/{id}/json', 'DonorController@getOne')->name('donors.getOne');
    Route::resource('/donors', 'DonorController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 書籍管理相關
    Route::post('/books/getBookDataByURL','BookController@getBookDataByURL')->name('books.bugurl');
    Route::get('/books/isbn/{isbn}/google', 'BookController@getDataByISBNFromGoogle')->name('books.isbn.google');
    Route::get('/books/getBookByKeyword', 'BookController@getBookByKeyword')->name('books.getBookByKeyword');
    Route::get('/books/getBookDataByBarcode', 'BookController@getBookDataByBarcode')->name('books.barcode.json');
    Route::get('/books/json', 'BookController@getList')->name('books.getList');
    Route::get('/books/{id}/json', 'BookController@getOne')->name('books.getOne');
    Route::resource('/books', 'BookController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // CKEditor 圖片上傳路由
    Route::post('/ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

    // 公告管理相關
    Route::get('/announcements/change_top/{id}','AnnouncementController@change_top')->name('announcements.change_top');
    Route::get('/announcements/{id}/json', 'AnnouncementController@getOne')->name('announcements.getOne');
    Route::resource('/announcements', 'AnnouncementController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 活動管理相關
    Route::get('/activities/change_top/{id}','ActivityController@change_top')->name('activities.change_top');
    Route::get('/activities/{id}/json', 'ActivityController@getOne')->name('activities.getOne');
    Route::get('/activities/json', 'ActivityController@getList')->name('activities.getList');
    Route::resource('/activities', 'ActivityController', ['only' => [
        'store', 'update', 'destroy'
    ]]);

    // 借閱管理
    Route::get('getBookListByStatus','BorrowController@getBookListByStatus');
    Route::get('getBookListByNoticed','BorrowController@getBookListByNoticed');

    // 借書
    Route::post('circulation/borrow','BorrowController@borrow')->name('circulation.borrow');
    Route::post('circulation/bookExpired','BorrowController@bookExpired');
    Route::post('circulation/Notified','BorrowController@Notified');

    // 還書
    Route::post('circulation/return','BorrowController@returnBook')->name('circulation.return');

    // 顯示已借出和逾期之書本
    Route::get('circulation/unreturns','UnreturnController@getList')->name('unreturns.getList');
});

Route::group(['middleware' => 'auth.jwt'], function () {
    // 使用者管理 only for admin  except getUserByToken
    Route::get('getUsersByName', 'UserController@getUsersByName');
    Route::get('getUserByToken', 'UserController@getUserByToken');
    Route::get('/users/{id}/json', 'UserController@getOne')->name('users.getOne');
        // POST api/users   PATCH api/users/{user}  DELETE api/users/{user}
        // postman 測試的話用post 然後 多一個 _method = PATCH
    Route::resource('users', 'UserController')->only(['store', 'update', 'destroy']);

    // 登入紀錄
    Route::get('getLoginLogs', 'LoginLogController@getLoginLogs')->name('loginLogs.getList');
    Route::get('getLoginLogsOrderByASC', 'LoginLogController@getListOrderByASC');
    Route::get('getLoginLogsOrderByUserId', 'LoginLogController@getListOrderByUserId');
    Route::get('getLoginLogsOrderByUserIdASC', 'LoginLogController@getListOrderByUserIdASC');
    Route::get('getLoginLogsById', 'LoginLogController@getLoginLogsById');
    Route::get('getLoginLogsByUserId', 'LoginLogController@getLoginLogsByUserId');
    Route::get('getLoginLogsByUserName', 'LoginLogController@getLoginLogsByUserName');
    Route::get('getLoginLogsByDate', 'LoginLogController@getLoginLogsByDate')->name('loginLogs.getLoginLogsByDate');
    Route::get('getLoginLogsByMonth', 'LoginLogController@getLoginLogsByMonth')->name('loginLogs.getLoginLogsByMonth');
    Route::get('getLoginLogsByYear', 'LoginLogController@getLoginLogsByYear')->name('loginLogs.getLoginLogsByYear');
    Route::get('getLoginLogsByTimeRange', 'LoginLogController@getLoginLogsByTimeRange')->name('loginLogs.getLoginLogsByTimeRange');

    // 借閱日誌(logs)相關
    Route::get('getBorrowLogs','BorrowLogController@getList')->name('borrowLogs.getList');
    // Route::get('getBorrowLogsByBorrowerId','BorrowLogController@getBorrowLogsByBorrowerId');
    // Route::get('getBorrowLogsByBookId','BorrowLogController@getBorrowLogsByBookId');
    // Route::get('getBorrowLogsByStatus','BorrowLogController@getBorrowLogsByStatus');

    // 統計圖表相關
    Route::get('borrowLogsChartByMonth','StatisticController@borrowLogsChartByMonth')->name('statistics.getBorrowLogsChartByMonth');
    Route::get('borrowLogsChartByYear','StatisticController@borrowLogsChartByYear')->name('statistics.getBorrowLogsChartByYear');

});

// 爬蟲
Route::post('getBookDataByURL','BookController@getBookDataByURL')->name('books.bugurl');
