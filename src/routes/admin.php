<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController as AdminEmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth.admin'])->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, "destroy"])->name('admin.logout');
    Route::get('verify-email', [AdminEmailVerificationPromptController::class, "__invoke"])
        ->name('admin.verification.notice');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.verification.send');
    Route::get('account/verify/{id}', [VerifyEmailController::class, 'verifyAccount'])
        ->name('admin.user.verify');
    Route::get('verify-email/success', [VerifyEmailController::class, 'success'])
        ->name('admin.verify.success');
});

Route::middleware(['auth.admin', 'admin.verified'])->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name('admin.home');
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [UserController::class, "index"])->name('admin.users_index');
        Route::get('create', [UserController::class, "create"])->name('admin.users_create');
        Route::post('create', [UserController::class, "store"])->name('admin.users_store');
        Route::get('edit/{user}', [UserController::class, "edit"])->name('admin.users_edit');
        Route::post('update/{user}', [UserController::class, "update"])->name('admin.users_update');
        Route::post('delete', [UserController::class, "delete"])->name('admin.users_delete');
    });
    Route::group(['prefix' => 'staffs'], function(){
        Route::get('/', [AdminController::class, "index"])->name('admin.staffs_index');
        Route::get('create', [AdminController::class, "create"])->name('admin.staffs_create');
        Route::post('create', [AdminController::class, "store"])->name('admin.staffs_store');
        Route::get('edit/{user}', [AdminController::class, "edit"])->name('admin.staffs_edit');
        Route::post('update/{user}', [AdminController::class, "update"])->name('admin.staffs_update');
        Route::post('delete', [AdminController::class, "delete"])->name('admin.staffs_delete');
    });
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/change-profile', [ProfileController::class, "changeProfile"])->name('admin.profile_change-profile');
        Route::post('/change-profile', [ProfileController::class, "updateProfile"])->name('admin.profile_update-profile');
        Route::get('/change-password', [ProfileController::class, "changePassword"])->name('admin.profile_change-password');
        Route::post('/change-password', [ProfileController::class, "updatePassword"])->name('admin.profile_update-password');
    });
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, "create"])->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, "store"]);
});