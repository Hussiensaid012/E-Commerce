<?php

use App\Http\Controllers\Cart\OrderController;
use App\Http\Controllers\Category\categoryController;
use App\Http\Controllers\Costomer\Address\CostomerAddressController;
use App\Http\Controllers\Costomer\Cart\ShowOrderController;
use App\Http\Controllers\Costomer\CostomerController;
use App\Http\Controllers\costomer\CostomerProductController;
use App\Http\Controllers\Costomer\Payment\PaymentController;
use App\Http\Controllers\product\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;








Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

    ],
    function () {
        Route::resource('/showcart', ShowOrderController::class);
        Route::resource('/costomer_address', CostomerAddressController::class);
        Route::resource('/payment', PaymentController::class);
    }
);
