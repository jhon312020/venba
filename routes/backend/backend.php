<?php
use App\Http\Controllers\Backend\ConceptController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

// Concepts Management
Route::get('concepts', [ConceptController::class, 'index'])->name('concept.index');
Route::get('concept/add', [ConceptController::class, 'add'])->name('concept.add');
Route::post('concept', [ConceptController::class, 'store'])->name('concept.store');
Route::group(['prefix' => 'concept/{id}'], function () {
  Route::get('edit', [ConceptController::class, 'edit'])->name('concept.edit');
  Route::patch('/', [ConceptController::class, 'update'])->name('concept.update');
  Route::delete('/', [ConceptController::class, 'destroy'])->name('concept.destroy');
});

//Categories Management

Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/add', [CategoryController::class, 'add'])->name('category.add');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::group(['prefix' => 'category/{id}'], function () {
    Route::get('edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/', [CategoryController::class, 'destroy'])->name('category.destroy');
});

//products Management

Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('product/add/fetch', 'ProductController@fetch')->name('addproduct.fetch');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::group(['prefix' => 'product/{id}'], function () {
	Route::get('edit', [ProductController::class, 'edit'])->name('product.edit');
	Route::post('edit/fetch', 'ProductController@editfetch')->name('editproduct.fetch');
	Route::patch('/', [ProductController::class, 'update'])->name('product.update');
	Route::delete('/', [ProductController::class, 'destroy'])->name('product.destroy');
});