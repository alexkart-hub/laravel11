<?php

use App\Http\Controllers\BlogCategory;
use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', [Main::class, 'index'])->name('main');
Route::get('/category', [BlogCategory::class, 'categories'])->name('categories');
Route::get('/category/{categoryCode}', [BlogCategory::class, 'category'])->name('category');
