<?php
use App\Http\Controllers\Api\ProductExtraSauceApiController;
use App\Http\Controllers\Api\ProductRealFieldApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ExtraApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['api'], 'prefix' => 'v1', 'namespace' => 'Api'], function () {
    /* Insert public api routes here */
    Route::apiResource('product_extra_sauces', 'ProductExtraSauceApiController')->only(['index', 'show']);
    Route::apiResource('product_real_fields', 'ProductRealFieldApiController')->only(['index', 'show']);
    Route::apiResource('products', 'ProductApiController')->only(['index', 'show']);
    Route::apiResource('extras', 'ExtraApiController')->only(['index', 'show']);
    Route::apiResource('categories', 'CategoryApiController')->only(['index', 'show']);
});

Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1', 'namespace' => 'Api'], function () {
    /* Insert private api routes here */
    Route::apiResource('product_extra_sauces', 'ProductExtraSauceApiController')->only(['create', 'store', 'update', 'destroy']);
    Route::apiResource('product_real_fields', 'ProductRealFieldApiController')->only(['create', 'store', 'update', 'destroy']);
    Route::apiResource('products', 'ProductApiController')->only(['create', 'store', 'update', 'destroy']);
    Route::apiResource('extras', 'ExtraApiController')->only(['create', 'store', 'update', 'destroy']);
    Route::apiResource('categories', 'CategoryApiController')->only(['create', 'store', 'update', 'destroy']);
});


