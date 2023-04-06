<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('user.home');
Route::get('/product-detail/{product}', [ProductDetailController::class, "show"])->name('user.products_detail');
Route::get('/order', [OrderController::class, "index"])->name('order');

Route::middleware(['auth.user'])->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, "destroy"])->name('user.logout');
    Route::group(['prefix' => 'cart'], function(){
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('add-to-cart', [CartController::class, 'store'])->name('cart.store');
        Route::post('update-cart', [CartController::class, 'update'])->name('cart.update');
        Route::get('delete{id}', [CartController::class, 'delete'])->name('cart.delete');
        Route::get('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    });

    Route::group(['prefix' => 'checkout'], function(){
        Route::get('/', [CheckOutController::class, 'index'])->name('checkout.index');
        Route::post('/', [CheckOutController::class, 'store']);
        Route::get('/callback-momo', [CheckOutController::class, 'callbackMomo'])->name('checkout.callback_momo');
    });
});

Route::group(["prefix" => "payment"], function(){
    Route::get('/', [PaymentController::class, "index"])->name('admin.payment.index');
    Route::get('/pay-with-momo-atm', [PaymentController::class, "payWithMoMoATM"])->name('admin.payment.pay_with_momo_atm');
    Route::get('/pay-with-vnpay', [PaymentController::class, "payWithVnpay"])->name('admin.payment.pay_with_vnpay');
    Route::get('/result', [PaymentController::class, "result"])->name('admin.payment.result');
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


