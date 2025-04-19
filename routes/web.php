<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SimilarProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Guest\AboutController;
use App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use App\Http\Controllers\Guest\ContactController as GuestContactController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::name('guest.')
    ->prefix('{locale?}')
    ->where(['locale' => 'tr|en'])
    ->group(function () {
        Route::get('/', HomeController::class)->name('home');

        Route::get('hakkimizda', AboutController::class)->name('about');

        Route::resource('hizmetler', GuestCategoryController::class)->only(['index', 'show']);

        Route::resource('urunler', GuestProductController::class)->only(['index', 'show']);

        Route::middleware(ProtectAgainstSpam::class)->resource('iletisim', GuestContactController::class)->only('index', 'store');
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::middleware('auth')->group(function () {
            Route::get('/', DashboardController::class)->name('dashboard');

            Route::resource('category', AdminCategoryController::class)->except('show');

            Route::resource('sub-category', SubCategoryController::class)->except('show');

            Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
            Route::post('/upload/delete', [UploadController::class, 'delete'])->name('upload.delete');

            Route::post('/admin/product/image-upload', [AdminProductController::class, 'uploadDescriptionImage'])
                ->name('product.image.upload');

            Route::resource('products', AdminProductController::class)->except('show');
            Route::get('/product/images/{id}', [AdminProductController::class, 'images'])->name('product.images');
            Route::post('/product/images/{id}/delete', [AdminProductController::class, 'deleteImage'])->name('product.image.delete');
            Route::get('/product/feature/{product}/add', [AdminProductController::class, 'addFeature'])->name('product.feature.add');
            Route::post('/product/feature/{product}/store', [AdminProductController::class, 'storeFeature'])->name('product.feature.store');
            Route::put('/product/feature/{product}/update', [AdminProductController::class, 'updateFeature'])->name('product.feature.update');

            Route::resource('similar-products', SimilarProductController::class)->only('edit', 'update', 'destroy');

            Route::resource('contact', AdminContactController::class)->only('index', 'destroy');
        });
    });
