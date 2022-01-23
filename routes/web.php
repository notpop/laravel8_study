<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UserLoginController;
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

Route::get('/', [HomeController::class, 'index'])->name('top');
Route::get('posts/{post}', [HomeController::class, 'show'])->where('post', '[0-9]+')->name('post.show');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::middleware('guest')->group(function () {
  Route::get('login', [UserLoginController::class, 'index'])->name('login');
  Route::post('login', [UserLoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
  Route::post('logout', [UserLoginController::class, 'logout'])->name('logout');

  Route::get('mypage', [MypageController::class, 'index'])->name('mypage');
  Route::get('mypage/posts/create', [MypageController::class, 'create'])->name('post.create');
  Route::post('mypage/posts/create', [MypageController::class, 'store']);
  Route::get('mypage/posts/{post}/edit', [MypageController::class, 'edit'])->name('post.edit.show');
  Route::post('mypage/posts/{post}/edit', [MypageController::class, 'update'])->name('post.update');
});
