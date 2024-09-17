<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\CountryController;
use App\Http\Controllers\Address\StateController;
use App\Http\Controllers\Cart\OrderController;
use App\Http\Controllers\Category\categoryController;
use App\Http\Controllers\Costomer\CostomerController;
use App\Http\Controllers\costomer\CostomerProductController;
use App\Http\Controllers\product\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;








Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

    ],
    function () {
        Route::resource('costomer', CostomerController::class);
        Route::resource('/category', categoryController::class);
        Route::resource('/product', ProductController::class);
        Route::resource('/create/cart', CostomerProductController::class)->name('show', 'cart');
        Route::resource('/orders', OrderController::class);
        Route::resource('/countries', CountryController::class);
        Route::resource('/cities', CityController::class);
        Route::resource('/states', StateController::class);
    }
);
