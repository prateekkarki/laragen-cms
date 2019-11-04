<?php
use App\Http\Controllers\Backend\Api\ProductExtraSauceController;
use App\Http\Controllers\Backend\Api\ProductRealFieldController;
use App\Http\Controllers\Backend\Api\ProductController;
use App\Http\Controllers\Backend\Api\ExtraController;
use App\Http\Controllers\Backend\Api\CategoryController;
	
	/* Insert your routes here */
    Route::resource('product_extra_sauces', ProductExtraSauceController::class);
    Route::resource('product_real_fields', ProductRealFieldController::class);
    Route::resource('products', ProductController::class);
    Route::resource('extras', ExtraController::class);
    Route::resource('categories', CategoryController::class);
