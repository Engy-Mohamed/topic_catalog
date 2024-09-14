<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('active')->group(function () {
//users routes
    Route::resource('users', UserController::class)->except(['show', 'destroy']);
//testimonials routes
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
//categories routes
    Route::resource('categories', CategoryController::class)->except(['show']);
//topics routes
    Route::resource('topics', TopicController::class);
//messages routes
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});
