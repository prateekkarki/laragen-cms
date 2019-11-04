<?php
use App\Http\Controllers\Backend\ProductExtraSauceController;
use App\Http\Controllers\Backend\ProductRealFieldController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ExtraController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UploadController;
	
	/* Insert your routes here */
    Route::resource('product_extra_sauces', ProductExtraSauceController::class);
    Route::resource('product_real_fields', ProductRealFieldController::class);
    Route::resource('products', ProductController::class);
    Route::resource('extras', ExtraController::class);
    Route::resource('categories', CategoryController::class);
	Route::resource('roles', RoleController::class);
	Route::get('/', [DashboardController::class, 'index']);
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::post('galleryupload', [UploadController::class, 'uploadGallery'])->name('gallery.uploader');
	Route::post('fileuploads', [UploadController::class, 'upload'])->name('uploader');
	Route::post('fileuploads/delete', [UploadController::class, 'delete'])->name('uploader.delete');
