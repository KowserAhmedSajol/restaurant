<?php

use Illuminate\Support\Facades\Route;
use restaurant\restaurant\Controllers\Api\ResBillingApiController;
use restaurant\restaurant\Controllers\Api\ResOrderItemApiController;
use restaurant\restaurant\Controllers\Api\ResOrderApiController;
use restaurant\restaurant\Controllers\Api\ResProductApiController;
use restaurant\restaurant\Controllers\Api\ResTaxApiController;
use restaurant\restaurant\Controllers\Api\ResTableApiController;
use restaurant\restaurant\Controllers\Api\ResCategoryApiController;


Route::middleware(['web', 'auth'])->group(function () {
    Route::group(['middleware' => 'api', 'prefix' => 'api', 'as' => 'api.'], function () {
        Route::resource('res_billings', ResBillingApiController::class);
        Route::resource('res_order_items', ResOrderItemApiController::class);
        Route::resource('res_orders', ResOrderApiController::class);
        Route::resource('res_products', ResProductApiController::class);
        Route::resource('res_taxes', ResTaxApiController::class);
        Route::resource('res_tables', ResTableApiController::class);
        Route::resource('res_categories', ResCategoryApiController::class);

        Route::post('/confirm-order', [ResOrderApiController::class, 'confirmOrder']);
        Route::get('/tables', [ResTableApiController::class, 'getTables']);
        Route::post('/load-order-item', [ResOrderItemApiController::class, 'loadOrderItem']);
        Route::post('/update-order-item', [ResOrderItemApiController::class, 'updateOrderItem']);
        Route::post('/order-payment', [ResBillingApiController::class, 'orderPayment']);

    });
});