<?php

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

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagsController');
    Route::resource('promotions','PromotionController');
    Route::get('/search','PromotionController@search');

    Route::get('/search2','PostController@search2');
    Route::get('/search3','UserController@search3');


});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('users', 'Usercontroller');

    Route::get('users', 'Usercontroller@index')->name('users.index');
    Route::post('users/{user}/makeadmin', 'Usercontroller@makeadmin')->name('user.makeadmin');
    Route::resource('categories', 'CategoryController');
    Route::resource('categoryStore', 'category_StoreController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('manageRequests', 'ManageRequestsController');
    Route::resource('manageAssessment', 'ManageAssessmentController');

});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('posts/create', 'PostController@autoprovince')->name('autocomplete.show');
