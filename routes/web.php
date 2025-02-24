<?php

use Illuminate\Support\Facades\Route;

Route::name('guest.')
    ->group(function () {
        Route::view('/', 'guest.home')->name('index');
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');
    });
