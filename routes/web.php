<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Guest\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('guest.')
    ->group(function () {
        Route::get('/', HomeController::class);
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::middleware('auth')->group(function () {
            Route::get('/', DashboardController::class)->name('dashboard');

            Route::resource('category', CategoryController::class)->except('show');

            Route::resource('contact', ContactController::class)->only('index');
        });
    });
