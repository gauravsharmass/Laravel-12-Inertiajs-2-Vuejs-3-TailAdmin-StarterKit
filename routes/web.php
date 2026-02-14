<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('postLogin');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('postRegister');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgotPassword');
Route::post('/forgot-password', action: [ForgotPasswordController::class, 'forgotPassword'])->name('postForgotPassword');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/change-password', [ForgotPasswordController::class, 'showChangePasswordForm'])->name('changePassword');
    Route::post('/change-password', [ForgotPasswordController::class, 'postChangePassword'])->name('postChangePassword');

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('userDashboard');
});
