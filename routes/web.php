<?php

use Illuminate\Support\Facades\Route;


// Route halaman beranda, terhubung ke fungsi index pada HomeController
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Group route untuk ArticleController
Route::controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    // Route untuk menampilkan daftar artikel (GET)
    Route::get('/articles', 'list')->name('article.list');

    // Route untuk menampilkan form dan menyimpan artikel baru (GET & POST)
    Route::match(['get', 'post'], '/articles/create', 'create')->name('article.create');
});

// Product Routes - dikelompokkan berdasarkan prefix /products dan ProductController
Route::controller(\App\Http\Controllers\ProductController::class)->prefix('/products')->group(function () {
    // Menampilkan daftar semua produk (GET /products)
    Route::get('/', 'index')->name('products');

    // Menampilkan form tambah produk baru (GET /products/create)
    Route::get('/create', 'create')->name('products.create');

    // Menyimpan produk baru dari form (POST /products/store)
    Route::post('/store', 'store')->name('products.store');

    // Menampilkan form edit produk berdasarkan id (GET /products/edit/{id})
    Route::get('/edit/{id}', 'edit')->name('products.edit');

    // Menyimpan perubahan data produk berdasarkan id (POST /products/update/{id})
    Route::post('/update/{id}', 'update')->name('products.update');

    // Menampilkan detail produk berdasarkan id (GET /products/show/{id})
    Route::get('/show/{id}', 'show')->name('products.show');
});
