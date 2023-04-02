<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('user.home');

Route::middleware(['auth.user'])->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, "destroy"])->name('user.logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, "create"])->name('user.login');
    Route::post('login', [AuthenticatedSessionController::class, "store"]);

    Route::get('register', [RegisterController::class, "create"])->name('user.register');
    Route::post('register', [RegisterController::class, "store"]);
    Route::get('verify-email/{user}', [RegisterController::class, "verifyEmail"])
        ->name('user.verification.notice');
    Route::get('account/verify/{id}', [VerifyEmailController::class, 'verifyAccount'])
        ->name('user.verify');
    Route::post('resend-email', [RegisterController::class, "resendEmail"])->name('user.resend_email');
    Route::get('verify-success', [RegisterController::class, "success"])->name('user.verify.success');

    Route::get('forgot-password', [ForgotPasswordController::class, "create"])->name('user.forgot_password_create');
    Route::post('forgot-password', [ForgotPasswordController::class, "store"])->name('user.forgot_password_store');
    Route::get('account/change-new-password', [ForgotPasswordController::class, "changePassword"])->name('user.change_new_password');
    Route::post('account/change-new-password', [ForgotPasswordController::class, "updatePassword"]);

});


