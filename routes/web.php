<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// (Mengelompokkan Controller)
Route::controller(\App\Http\Controllers\ArticleController::class)->group(function() {
    Route::get('/articles', 'list')->name('article.list');
    // dua ruote dibawah pakai url yang sama jadi bisa dibuat:
    Route::match(['get', 'post'], '/articles/create', 'create')->name('article.create');
    // Route::get('/articles/create', 'create')->name('article.create'); jadi ini dihapus pakai yang diatas
    // Route::post('/articles/create', 'create'); jadi ini dihapus pakai yang diatas
    Route::get('/articles/{slug}', 'single')->name('article.single');
    Route::match(['get', 'post'], '/articles/{id}/edit', 'edit')->name('article.edit');
    Route::post('/articles/{id}/delete', 'delete')->name('article.delete');

});

// (Ini yang sebelum dikelompokkan seperti diatas, kita pakai yang atas ya)
// Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'list'])->name('article.list');
// Route::get('/articles/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
// Route::post('/articles/create', [\App\Http\Controllers\ArticleController::class, 'create'])

