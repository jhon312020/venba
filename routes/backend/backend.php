<?php
use App\Http\Controllers\Backend\ConceptController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\CompatibilityController;
use App\Http\Controllers\Backend\PowerconsumptionController;

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
Route::post('category/getSubcategories', [CategoryController::class, 'getSubcategories'])->name('category.getSubcategories');
Route::group(['prefix' => 'category/{id}'], function () {
    Route::get('edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/', [CategoryController::class, 'destroy'])->name('category.destroy');
});

//products Management

Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::group(['prefix' => 'product/{id}'], function () {
	Route::get('edit', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('deleteimage', 'ProductController@deleteimage')->name('deleteproduct.image');

	Route::patch('/', [ProductController::class, 'update'])->name('product.update');
	Route::delete('/', [ProductController::class, 'destroy'])->name('product.destroy');
});
// Brands Management
Route::get('brands', [BrandController::class, 'index'])->name('brand.index');
Route::get('brand/add', [BrandController::class, 'add'])->name('brand.add');
Route::post('brand', [BrandController::class, 'store'])->name('brand.store');
Route::group(['prefix' => 'brand/{id}'], function () {
  Route::get('edit', [BrandController::class, 'edit'])->name('brand.edit');
  Route::patch('/', [BrandController::class, 'update'])->name('brand.update');
  Route::delete('/', [BrandController::class, 'destroy'])->name('brand.destroy');
});
// Type Management
Route::get('type', [TypeController::class, 'index'])->name('type.index');
Route::get('type/add', [TypeController::class, 'add'])->name('type.add');
Route::post('type', [TypeController::class, 'store'])->name('type.store');
Route::group(['prefix' => 'type/{id}'], function () {
  Route::get('edit', [TypeController::class, 'edit'])->name('type.edit');
  Route::patch('/', [TypeController::class, 'update'])->name('type.update');
  Route::delete('/', [TypeController::class, 'destroy'])->name('type.destroy');
});
// Compatibility Management
Route::get('compatibility', [CompatibilityController::class, 'index'])->name('compatibility.index');
Route::get('compatibility/add', [CompatibilityController::class, 'add'])->name('compatibility.add');
Route::post('compatibility', [CompatibilityController::class, 'store'])->name('compatibility.store');
Route::group(['prefix' => 'compatibility/{id}'], function () {
  Route::get('edit', [CompatibilityController::class, 'edit'])->name('compatibility.edit');
  Route::patch('/', [CompatibilityController::class, 'update'])->name('compatibility.update');
  Route::delete('/', [CompatibilityController::class, 'destroy'])->name('compatibility.destroy');
});
// Powerconsumption Management
Route::get('powerconsumption', [PowerconsumptionController::class, 'index'])->name('powerconsumption.index');
Route::get('powerconsumption/add', [PowerconsumptionController::class, 'add'])->name('powerconsumption.add');
Route::post('powerconsumption', [PowerconsumptionController::class, 'store'])->name('powerconsumption.store');
Route::group(['prefix' => 'powerconsumption/{id}'], function () {
  Route::get('edit', [PowerconsumptionController::class, 'edit'])->name('powerconsumption.edit');
  Route::patch('/', [PowerconsumptionController::class, 'update'])->name('powerconsumption.update');
  Route::delete('/', [PowerconsumptionController::class, 'destroy'])->name('powerconsumption.destroy');
});