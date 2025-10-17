<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// single action  controller
Route::get('/', IndexController::class);

Route::get('/contact', ContactController::class);


Route::get('/job', [JobController::class, 'index']);

Route::middleware('auth')->group(function(){

    Route::resource('blog', PostController::class);
});
// Resource Controller


// Resource Controller
Route::resource('tags', TagController::class);


Route::resource('comments', CommentController::class);

// signup route and login route
Route::get('/signup', [AuthController::class, 'signupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('onlyMy')->group(function(){

    Route::get('/about', AboutController::class);
});

// student route


Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index']);
