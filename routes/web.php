<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

Route::get('/', [Main::class, 'index'])->name('main');
Route::group([], function () {
    Route::resource('category', CategoryController::class)->names('blog.categories');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/{category}/{post}', [PostController::class, 'index'])->name('blog.post');
    Route::get('/{category}/{post}/edit', [PostController::class, 'edit'])->name('blog.post.edit');
});
