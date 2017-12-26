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


    Route::get('/news', 'HomeController@showNews')->name('news');
    Route::post('/news', 'HomeController@likeNews')->name('news.like');
    
    Route::get('/instructions', 'HomeController@showInstructions')->name('instructions');
    Route::post('/instructions', 'HomeController@likeInstruction')->name('instruction.like');

    Route::get('/materials', 'HomeController@showMaterials')->name('materials');
    Route::post('/materials', 'HomeController@likeMaterial')->name('material.like');
 
    Route::resource('/myInstructions', 'Instructions\\MyInstructionsController');
    Route::resource('/myNews', 'News\\MyNewsController');
    Route::resource('/myMaterials', 'Materials\\MyMaterialsController');


});
