<?php

use Illuminate\Support\Facades\Route;
use restaurant\restaurant\Controllers\ResBillingController;
use restaurant\restaurant\Controllers\ResOrderItemController;
use restaurant\restaurant\Controllers\ResOrderController;
use restaurant\restaurant\Controllers\ResProductController;
use restaurant\restaurant\Controllers\ResTaxController;
use restaurant\restaurant\Controllers\ResTableController;
use restaurant\restaurant\Controllers\ResCategoryController;


Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('res_billings', ResBillingController::class);
    Route::resource('res_order_items', ResOrderItemController::class);
    Route::resource('res_orders', ResOrderController::class);
    Route::resource('res_products', ResProductController::class);
    Route::resource('res_taxes', ResTaxController::class);
    Route::resource('res_tables', ResTableController::class);
    Route::resource('res_categories', ResCategoryController::class);

    Route::get('/product-order', [ResProductController::class, 'product']);
    Route::get('/product-order-list', [ResProductController::class, 'productOrderList']);

});