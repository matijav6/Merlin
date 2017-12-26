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



Route::get('/news', 'HomeController@showNews')->name('news');
    

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//*********************************************** */

Route::group(['middleware' => ['admin']], function () {

    Route::resource('admin/users', 'Admin\\AdministerUsersController');
    Route::resource('admin/colleges', 'Admin\\AdministerCollegesController');
    Route::resource('admin/courses', 'Admin\\AdministerCoursesController');

});

Route::group(['middleware' => ['auth']], function () {

    Route::resource('profile', 'ProfileController');



    Route::resource('/myInstructions', 'Instructions\\InstructionsController');
    Route::resource('/myNews', 'News\\NewsController');
    Route::resource('/myMaterials', 'Materials\\MaterialsController');


});
