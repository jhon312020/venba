<?php
use App\Http\Controllers\Frontend\ProductlistingController;
use App\Http\Controllers\Frontend\FrontendController;
Route::get('homepage', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('frontend.logout');
Route::get('productlist', [ProductlistingController::class, 'index'])->name('product.index');