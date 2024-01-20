<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Backend\TaskCategoryController;
use App\Http\Controllers\Backend\AdminAuthFormController;
use App\Http\Controllers\Backend\AdminDashboardController;



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
Route::get('/unauthorized', [AdminAuthFormController::class, 'unAuthError'])->name('unauth');

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
// });
                                               
Route::middleware(['auth'])->group(function () {

    // User dashboard route
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    });
    // Admin dashboard route
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});
Route::get('/', function () {
    return view('backend.index');
});


Route::get('/user-profile', [UserController::class, 'profile'])->name('user.profile'); 
Route::get('/user-setting', [UserController::class, 'setting'])->name('user.setting'); 
Route::get('/user-activity', [UserController::class, 'activity'])->name('user.activity'); 
Route::get('/user-notification', [UserController::class, 'notification'])->name('user.notification'); 

Route::get('/create-category', [TaskCategoryController ::class, 'create'])->name('category.create');
Route::post('/store-category', [TaskCategoryController ::class, 'store'])->name('category.store');
Route::get('/create-manage', [TaskCategoryController::class, 'categoryManage'])->name('category.manage');                                                              

Route::get('/create-task', [TaskController::class, 'create'])->name('task.create');   
Route::post('/store-task', [TaskController::class, 'store'])->name('task.store');   
Route::get('/manage-task', [TaskController::class, 'index'])->name('task.list');   
Route::get('/task-show/{id?}', [TaskController::class, 'show'])->name('task.show');   

Route::get('test', function () {
    event(new App\Events\UserRegisterNotification('shariya'));
    return "Event has been sent!";
});