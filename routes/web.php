<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/job', [\App\Http\Controllers\JobController::class, 'index']);
