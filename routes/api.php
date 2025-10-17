<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CommentApiController;
use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\api\TagApiController;
use App\Http\Controllers\Api\PostsController;
use Illuminate\Support\Facades\Route;


// Route::post('/blog', [\App\Http\Controllers\PostController::class, 'create']);
// Route::delete('/blog/{id}', [\App\Http\Controllers\PostController::class, 'delete']);


// Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'create']);

// Route::post('/tags', [\App\Http\Controllers\TagController::class, 'create']);
// Route::post('/tags/insert', [\App\Http\Controllers\TagController::class, 'insert']);


// post resource controller
// Route::apiResource('posts', PostApiController::class);

// New layered API structure - RESTful resource routes
// Provides CRUD operations: index, store, show, update, destroy
Route::apiResource('posts', PostsController::class);
Route::apiResource('comments', CommentApiController::class);
Route::apiResource('tags', TagApiController::class);

// Authentication routes - Prefix: /api/auth
Route::prefix('auth')->group(function () {
    // Public routes - No authentication required
    Route::post('login', [AuthController::class, 'login']);        // POST /api/auth/login
    Route::post('register', [AuthController::class, 'register']);  // POST /api/auth/register
    
    // Protected routes - Requires JWT token authentication
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);   // POST /api/auth/logout
        Route::post('refresh', [AuthController::class, 'refresh']); // POST /api/auth/refresh
        Route::get('me', [AuthController::class, 'me']);            // GET /api/auth/me
    });
});

// Student resource routes - Full CRUD operations
Route::resource('students', \App\Http\Controllers\StudentController::class);

