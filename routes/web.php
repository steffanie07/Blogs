<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts/{post}',[HomeController::class, 'show'])->name('posts.show');
Route::post('/comments', [HomeController::class, 'store'])->name('comments.store');



 Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



    Route::middleware('auth')->group(function () {
    Route::get('/admin/posts/create', [AdminController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [AdminController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts/{post}/edit', [AdminController::class, 'edit'])->name('posts.edit');
    Route::patch('/admin/posts/{post}', [AdminController::class, 'update'])->name('posts.update');

    Route::delete('/admin/posts/{post}', [AdminController::class, 'destroy'])->name('posts.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Include additional routes
require __DIR__.'/auth.php';
