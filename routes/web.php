<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AboutController;

// **Halaman Utama (Home)**
Route::get('/', function () {
    return view('products.index');
})->name('home');

// **Halaman About**
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// **Halaman Contact**
Route::get('/contact', function () {
    return view('products.contact');
})->name('contact');

// **Rute Produk**
Route::get('/products', [ProductViewController::class, 'index'])->name('products.index'); // Menampilkan semua produk
Route::get('/products/{id}', [ProductViewController::class, 'show'])->name('products.show'); // Menampilkan detail produk berdasarkan ID
Route::get('/products-by-category', [ProductViewController::class, 'productsByCategoryAjax']); // Menampilkan produk berdasarkan kategori (via AJAX)

// **Rute Kategori**
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); // Menampilkan semua kategori
Route::get('/category/{id}', [CategoryController::class, 'productsByCategory'])->name('categories.products'); // Menampilkan produk berdasarkan kategori (ID)
Route::get('/categories/{name}', [CategoryController::class, 'showProductsByCategory'])->name('categories.products'); // Menampilkan produk berdasarkan nama kategori
Route::resource('categories', CategoryController::class); // Resource controller untuk kategori

// **Fungsi Filter**
Route::get('/filter', [CategoryController::class, 'filter'])->name('filter'); // Filter produk berdasarkan kriteria tertentu

// **Fungsi Pencarian**
Route::get('/search', [SearchController::class, 'search'])->name('search'); // Mencari produk berdasarkan query pencarian

