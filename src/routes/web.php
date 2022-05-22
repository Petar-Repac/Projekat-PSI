<?php

// Autor: Vukašin Stepanović & Petar Repac

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Posts\PostController;

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

// Autor: Vukašin Stepanović
Route::get('/user/{username}', [UserController::class, 'get']);
Route::patch('/user/{username}', [UserController::class, 'patch']);

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


// Autor: Petar Repac

//Post-related routes
Route::get('/posts', [PostController::class, 'showPosts'])->name('posts');
Route::get('/posts/{id}', [PostController::class, 'showSpecificPost'])->name('posts');
Route::get('/writepost', [PostController::class, 'showPostForm'])->name('writeform');
Route::post('/writepost', [PostController::class, 'writePost'])->name('write');