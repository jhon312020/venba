<?php
use App\Http\Controllers\Frontend\ProductlistingController;
use App\Http\Controllers\Frontend\FrontendController;
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('frontend.logout');
Route::get('products/{category}', [ProductlistingController::class, 'index'])->name('product.index');
Route::group(['prefix' => 'products/{category}'], function () {
Route::post('filterproductlist', [ProductlistingController::class, 'filterproductlist'])->name('productlist.filter');
});