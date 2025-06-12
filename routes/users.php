<?php

use App\Http\Controllers\ManageUserController\personalCustomerController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Users\UserLoginController;
use App\Http\Controllers\Users\UserSignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserLoginController::class, 'index'])->name('user.login');


Route::get('/user-dashboard', [PostController::class, 'show'])->name('user.dashboard');

Route::group(['prefix' => '/users', 'middleware' => ['is.Admin','auth.access']], function () {
  Route::get('/user-logout', [UserLoginController::class, 'logout'])->name('user.logout');

  Route::get('/user-profile/{id}', [PostController::class, 'profile'])->name('user.profile');
  Route::get('/create-post', [PostController::class, 'create'])->name('create.post');
  Route::post('/make-post', [PostController::class, 'post'])->name('make.post');

  Route::get('/all-posts', [PostController::class, 'showAllPosts'])->name('all.post');
});


Route::middleware('auth.custom')->group(function () {
  Route::post('/user-login', [UserLoginController::class, 'verifyUser'])->name('verify.user');
  Route::get('/user-signup', [UserSignUpController::class, 'index'])->name('user.signup');
  Route::post('/user-signup', [UserSignUpController::class, 'register'])->name('register.user');
});
