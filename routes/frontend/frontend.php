<?php
use App\Http\Controllers\Frontend\frontview;
use App\Http\Controllers\Frontend\Productfrontview;
Route::get('homepage', [frontview::class, 'index'])->name('frontend.index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('frontend.logout');
Route::get('productlist', [Productfrontview::class, 'index'])->name('product.index');