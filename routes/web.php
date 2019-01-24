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

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::group(['prefix' => 'user'], function(){
    // home
    Route::get('home', 'User\HomeController@index')->name('user.home');

    // login logout
    Route::get('login', 'User\Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('login', 'User\Auth\LoginController@login')->name('user.login');
    Route::post('logout', 'User\Auth\LoginController@logout')->name('user.logout');

    // register
    Route::get('register', 'User\Auth\RegisterController@showRegisterForm')->name('user.register');
    Route::post('register', 'User\Auth\RegisterController@register')->name('user.register');
});


// Admin
Route::group(['prefix' => 'admin'], function(){
    // home
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');

    // login logout
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
});
