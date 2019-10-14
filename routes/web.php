<?php
use App\Http\Controllers\Blog\Postcontroller;
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

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}',[Postcontroller::class,'show'])->name('blog.show');
Route::get('blog/category/{category}',[Postcontroller::class,'category'])->name('blog.category');

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::resource('posts', 'PostController');
    Route::resource('posts1', 'Post1Controller');

    Route::resource('CallMechanic', 'CallMechanicController');
    Route::resource('makecar', 'MakecarController');

    Route::resource('promotions','PromotionController');
    Route::get('/search','PromotionController@search'); //ค้นหา admin จัดการโปรโมชัน
    Route::get('/search2','PostController@search2'); //ค้นหาข้อมูลร้าน
    Route::get('/search3','UserController@search3'); // ค้นหา admin จัดการผู้ใช้
    Route::get('/search4','UserPromotionController@search4'); // ค้นหาโปรโมชัน ผู้ใช้รถยนต์

    Route::post('Post', 'PostController@store')->name('store');

    Route::get('profile', 'Usercontroller@profile'); //โปรไฟล์ผู้ใช้
    Route::get('editprofile', 'Usercontroller@editprofile'); //แก้ไขโปรไฟล์ผู้ใช้

    Route::resource('MoneyRequests', 'MoneyRequestController'); //จัดการคำร้องขอคืนเงิน
    Route::resource('DepositManages', 'DepositManageController'); //จัดการคำร้องหักค่ามัดจำการเรียก
    Route::resource('TransferMoneys', 'TransferMoneyController'); //จัดการข้อมูลการโอนเงิน

    Route::resource('userpromotions', 'UserPromotionController'); //จัดการข้อมูลการโอนเงิน
    Route::resource('notifications', 'NotificationController');

    Route::resource('notifdetails', 'NotifDetailController');

});
use App\Post1;
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('users', 'Usercontroller');

    Route::get('users', 'Usercontroller@index')->name('users.index');
    Route::post('users/{user}/makeadmin', 'Usercontroller@makeadmin')->name('user.makeadmin');
    Route::resource('categories', 'CategoryController');
    Route::resource('categoryStore', 'category_StoreController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('managerequests', 'ManageRequestsController');
    Route::resource('manageAssessment', 'ManageAssessmentController');

});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function() {
    return view('test');
});

Route::get('/test1', function() {
    return view('test1');
});

Route::get('/Geolocation', function() {
    return view('Geolocation');
});

Route::get('/Geo', function() {
    return view('Geo');
});

// Route::get('/rating', function() {
//     return view('ratings.index');
// });

Route::resource('rating', 'ArticleratingController');

// Route::get('/show', function() {
//     return view('manageRequest.show');
// });


Route::post('posts/create', 'PostController@autoprovince')->name('autocomplete.show');
