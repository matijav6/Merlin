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



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/instructions', 'Instructions\\InstructionsController');
    Route::resource('/news', 'News\\NewsController');
    Route::resource('/materials', 'Materials\\MaterialsController');
    Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    

});
Route::resource('admin/administer-users', 'Admin\\AdministerUsersController');
Route::resource('admin/administer-colleges', 'Admin\\AdministerCollegesController');