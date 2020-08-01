<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/conceptlist', 'ConceptAddEdit@concept')->middleware('auth');
Route::get('/addconcept', 'ConceptAddEdit@add')->middleware('auth');
Route::post('/conceptadded/store', 'ConceptAddEdit@store')->name('conceptadded.store');
Route::get('/editconcept/{id}',  'ConceptAddEdit@edit');
Route::post('/updateconcept/update', 'ConceptAddEdit@update')->name('updateconcept.update');
Route::get('/conceptlist/{id}',  'ConceptAddEdit@delete');
Route::get('/categorylist', 'CategoryController@category')->middleware('auth');
Route::get('/addcategory', 'CategoryController@add')->middleware('auth');

Route::post('/categoryadded/store', 'CategoryController@store')->name('categoryadded.store');
Route::get('/editcategory/{id}',  'CategoryController@edit');
Route::post('/updatecategory/update', 'CategoryController@update')->name('updatecategory.update');
Route::get('/categorylist/{id}',  'CategoryController@delete');
//Route::post('/profile', 'ConceptController@concept');
Route::get('/productlist', 'ProductController@product')->middleware('auth');
Route::get('/addproduct', 'ProductController@add')->middleware('auth');

Route::post('/productadded/store', 'ProductController@store')->name('productadded.store');
Route::post('/addproduct/fetch', 'ProductController@fetch')->name('addproduct.fetch');
Route::get('/editproduct/{id}',  'ProductController@edit');
Route::post('/updateproduct/update', 'ProductController@update')->name('updateproduct.update');
Route::get('/productlist/{id}',  'ProductController@delete');

//Added by JR

Route::group(['namespace' => 'Backend', 'prefix' => 'admin','middleware' => [
                            'auth',
                            'role:admin'
                        ], 'as' => 'admin.'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});
Route::group(['namespace' => 'Frontend', 'prefix' => '', 'as' => 'frontview.'], function () {
    /*
     * These routes need view-frontend registered users
     * (good if you want to allow more than one group in the frontend,
     *
     * Note: Registered users has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the user or password is expired
     */
    include_route_files(__DIR__.'/frontend/');
});