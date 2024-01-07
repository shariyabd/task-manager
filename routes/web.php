<?php

use App\Http\Controllers\Backend\AdminAuthFormController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache cleared successfully";
});


Route::get('/login', [AdminAuthFormController::class, 'loginForm'])->name('login.form');
Route::get('/register', [AdminAuthFormController::class, 'registerForm'])->name('register.form');
Route::post('/register-post', [AuthController::class, 'register'])->name('register');
Route::post('/login-post', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forget', [AdminAuthFormController::class, 'resetForm'])->name('reset.form');
Route::post('forget-post', [ResetPasswordController::class, 'resetPassword'])->name('forget.post');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('user.password.reset');
Route::post('password-update', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
Route::get('/eamil/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    return view('backend.index');
});