<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TagController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth');


Route::patch(
    '/admin/users/{user}/toggle-block',
    [AdminController::class, 'toggleBlock']
)->name('users.toggle-block');

Route::resource('admin/users', AdminController::class);

Route::resource('posts', PostController::class);

Route::resource('category', CategoryController::class);

Route::post('/posts/{post}/like', [LikeController::class, 'store'])
    ->name('likes.store');

Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])
    ->name('likes.destroy');

Route::resource('tags', TagController::class);
