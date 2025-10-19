<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', IndexController::class)->name('home');
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/job', [JobController::class, 'index'])->name('job.index');

// Guest routes (auth)
Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'signupForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Blog routes with role-based access
    Route::prefix('blog')->name('blog.')->group(function () {
           // Admin only can create and delete
        Route::middleware('role:admin')->group(function () {
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::post('/', [PostController::class, 'store'])->name('store');
            Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');
        });
        // All authenticated users can view
        Route::middleware('role:admin,editor,viewer')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/{id}', [PostController::class, 'show'])->name('show');
        });

        // Admin and editor can create and edit
        Route::middleware('role:admin,editor')->group(function () {
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PostController::class, 'update'])->name('update');
        });


    });
});

// Resource routes
Route::resource('tags', TagController::class);
Route::resource('comments', CommentController::class);

// Custom middleware routes
Route::middleware('onlyMy')->group(function () {
    Route::get('/about', AboutController::class)->name('about');
});

// Other routes
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
