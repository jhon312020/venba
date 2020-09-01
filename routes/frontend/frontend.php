<?php
use App\Http\Controllers\Frontend\ProductlistingController;
use App\Http\Controllers\Frontend\FrontendController;
//use App\Http\Controllers\Frontend\PaymentController;
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/homefrontview', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('frontend.logout');
Route::get('products/{category}', [ProductlistingController::class, 'index'])->name('product.index');
Route::group(['prefix' => 'products/{category}'], function () {
Route::post('filterproductlist', [ProductlistingController::class, 'filterproductlist'])->name('productlist.filter');
Route::get('{id}', [ProductlistingController::class, 'singleproduct'])->name('product.detail');
});
Route::post('/addtocart', [ProductlistingController::class, 'add_to_cart'])->name('product.addtocart');
Route::post('/deletefromcart', [FrontendController::class, 'delete_from_cart'])->name('product.deletefromcart');
Route::post('/updatecartquantity', [FrontendController::class, 'update_cart_quantity'])->name('product.updatecart');
Route::get('/basic_solution', [FrontendController::class, 'basic_solution'])->name('frontend.basic');
Route::get('/advanced_solution', [FrontendController::class, 'advanced_solution'])->name('frontend.advanced');
Route::get('/premium_solution', [FrontendController::class, 'premium_solution'])->name('frontend.premium');
Route::get('/installation_guide', [FrontendController::class, 'installation_guide'])->name('frontend.basic');
Route::get('/trouble_shooting', [FrontendController::class, 'trouble_shooting'])->name('frontend.trouble');
Route::get('/online_support', [FrontendController::class, 'online_support'])->name('frontend.online');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/my_profile', [FrontendController::class, 'my_profile'])->name('frontend.myprofile');
Route::get('/my_wishlist', [FrontendController::class, 'my_wishlist'])->name('frontend.mywishlist');
Route::get('/my_orders', [FrontendController::class, 'my_orders'])->name('frontend.myorders');
Route::get('/shopping-basket/{id}', [FrontendController::class, 'shopping_basket'])->name('frontend.shopping-basket');
Route::get('/shopping-basket', [FrontendController::class, 'shopping_basket_from_cart'])->name('frontend.shopping-basket_from_cart');
Route::get('/address', [FrontendController::class, 'address'])->name('frontend.address')->middleware('auth');
Route::get('/payment', [FrontendController::class, 'payment'])->name('frontend.payment')->middleware('auth');
Route::get('/search', [FrontendController::class, 'search'])->name('frontend.search');
Route::post('/sendmail', [FrontendController::class, 'sendmail'])->name('frontend.sendmail');
Route::post('/saveaddress', [FrontendController::class, 'save_address'])->name('frontend.saveaddress')->middleware('auth');
Route::post('/searchresult', [FrontendController::class, 'getsearch_result'])->name('frontend.searchresult');
Route::post('/search/fetch_data', [FrontendController::class, 'fetch_data'])->name('frontend.fetchdata');
Route::post('/addaddresstosession', [FrontendController::class, 'addaddresstosession'])->name('frontend.addaddresstosession');
Route::post('/getsearch', [FrontendController::class, 'getsearch'])->name('frontend.getsearch');
Route::post('/checkaddress', [FrontendController::class, 'checkaddress'])->name('frontend.checkaddress');
Route::get('/orders', [FrontendController::class, 'orders'])->name('frontend.orders')->middleware('auth');
Route::get('/thankyou', [FrontendController::class, 'thankyou'])->name('frontend.thankyou')->middleware('auth');
Route::post('/ordertocart', [FrontendController::class, 'orderpage_to_cart'])->name('product.ordertocart');
/*Route::post('/repeatorder', [FrontendController::class, 'repeatorder'])->name('product.repeatorder');*/
Route::get('/repeatorder/{orderid}', [FrontendController::class, 'repeatorder'])->name('product.repeatorder');
/*Route::post('/downloadinvoice', [FrontendController::class, 'downloadinvoice'])->name('product.downloadinvoice');*/
Route::get('/downloadinvoice/{orderid}', [FrontendController::class, 'downloadinvoice'])->name('frontend.downloadinvoice');
Route::get('/refresh_csrf', function () {
    return response()->json(csrf_token());
})->name('csrf.renew');