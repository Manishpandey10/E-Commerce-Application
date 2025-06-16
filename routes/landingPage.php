<?php

use App\Http\Controllers\LandingPage\LandingPageController;
use Illuminate\Support\Facades\Route;

    // Route::middleware(['auth.custom'])->group(function () {
        Route::get('/',[LandingPageController::class , 'index'])->name('landing.page');
        Route::get('/shop',[LandingPageController::class, 'shop'])->name('shop.page');
        Route::get('/contact-us',[LandingPageController::class , 'contact'])->name('contact.page');
        Route::get('/shop-category-products/{id}',[LandingPageController::class, 'filter'])->name('shop.category');
       RoutE::get('/product_details/{id}',[LandingPageController::class, 'productDetails'])->name('shop.details');
    // });




    