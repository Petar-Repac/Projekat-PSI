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

// // Authentication Routes...
// Route::get('login', 'LoginController@showLoginForm')->name('login');
// Route::post('login', 'LoginController@login');
// Route::post('logout', 'LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'RegisterController@register');
