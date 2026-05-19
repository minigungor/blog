<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth');

Route::resource('admin/users', AdminController::class);


Route::get('/posts', [PostController::class, 'showPosts']);
Route::get('/posts/{user}', [PostController::class, 'showForm']);
Route::post('/posts/{user}', [PostController::class, 'addPost']);
