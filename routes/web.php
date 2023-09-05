<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SocialMediaAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login/google', [SocialMediaAuthController::class, 'googleRedirect'])->name('login.google');
Route::get('login/google/callback', [SocialMediaAuthController::class, 'handleGoogleCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users', [UserController::class, 'index'])->name('user.profile');
Route::put('users', [UserController::class, 'update'])->name('user.update');

Route::resource('videos', VideoController::class);
Route::resource('articles', ArticleController::class);
