<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);

Route::get('/about', [\App\Http\Controllers\IndexController::class, 'about']);

Route::get('/contact', [\App\Http\Controllers\IndexController::class, 'contact']);

Route::get('/job', [\App\Http\Controllers\JobController::class, 'index']);

Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/blog/create', [\App\Http\Controllers\PostController::class, 'create']);
Route::get('/blog/delete', [\App\Http\Controllers\PostController::class, 'delete']);
//  find a post
Route::get('/show/{id}' , [\App\Http\Controllers\PostController::class, 'show']);

Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index']);
Route::get('/comments/create', [\App\Http\Controllers\CommentController::class, 'create']);

