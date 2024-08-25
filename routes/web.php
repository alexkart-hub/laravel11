<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\Main;
use App\Http\Controllers\Blog\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Main::class, 'index'])->name('main');
Route::group(['prefix' => 'category'], function () {
    Route::get('/{category}/post_{post}', [PostController::class, 'index'])
        ->where(['category' => '.*'])
        ->name('blog.post');
    Route::get('/{category}/post_{post}/edit', [PostController::class, 'edit'])->name('blog.post.edit');
});

Route::group([], function () {
    Route::resource('category', CategoryController::class)
        ->where(['category' => '.*'])
        ->names('blog.categories');
});


Route::group(['prefix' => 'template'], function () {
    Route::get('/', fn () => view('template.main'))->name('template.main');
});
