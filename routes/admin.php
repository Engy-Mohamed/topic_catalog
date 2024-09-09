<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/* Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('create', 'create')->name('categories.create');
    Route::post('', 'store')->name('categories.store');
    Route::get('', 'index')->name('categories.index');
    Route::get('{id}/edit', 'edit')->name('categories.edit');
    Route::put('{id}', 'update')->name('categories.update');
    Route::delete('{id}', 'destroy')->name('categories.destroy');
}); */

//users routes
Route::resource('users', UserController::class)->except(['show','destroy']);
//testimonials routes
Route::resource('testimonials', TestimonialController::class)->except(['show']);
//categories routes
Route::resource('categories', CategoryController::class)->except(['show']);
//topics routes
Route::resource('topics', TopicController::class);
//messages routes
Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
/* Route::controller(MessageController::class)->prefix('messages')->group(function () {
    Route::get('', 'index')->name('messages.index');
    Route::patch('{id}', 'read')->name('messages.read');
    Route::get('{id}', 'show')->name('messages.show');
    Route::delete('{id}', 'destroy')->name('messages.destroy');
}); */
//Route::resource('books', BookController::class)->only(['create', 'store']);


