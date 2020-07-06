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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addconcept', 'ConceptController@concept');
Route::post('/conceptadded', 'ConceptController@store');
Route::post('/categoryadded', 'CategoryController@store');
Route::get('/addcategory', 'CategoryController@category');
//Route::post('/profile', 'ConceptController@concept');
Route::get('/addproduct', 'ProductController@product');
Route::post('/addproduct', 'ProductController@store');