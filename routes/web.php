<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/filter', [CategoryController::class, 'filter'])->name('filter');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/products-by-category', [ProductViewController::class, 'productsByCategoryAjax']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{id}', [CategoryController::class, 'productsByCategory'])->name('categories.products');
Route::get('/categories/{name}', [CategoryController::class, 'showProductsByCategory'])->name('categories.products');
Route::resource('categories', CategoryController::class);
Route::get('/products', [ProductViewController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductViewController::class, 'show'])->name('products.show');
Route::get('/contact', function () {
    return view('products.contact');
})->name('contact');
Route::get('/', function () {
    return view('products.index');
})->name('home');

