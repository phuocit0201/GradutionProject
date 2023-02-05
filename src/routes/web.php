<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(["prefix" => "admin"], function(){
    Route::get('/', [DashboardController::class, "index"])->name('admin.home');
});

Route::get('/', [HomeController::class, "index"])->name('client.home');




