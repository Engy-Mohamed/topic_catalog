<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


Route::controller(PublicController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('index', 'index')->name('index');
    Route::get('contact', 'contact')->name('contact');
    Route::get('testimonials', 'testimonials')->name('testimonials');
    Route::prefix('topics')->group(function () {
        Route::get('{id}', 'topics_detail')->name('topics_detail');
        Route::get('', 'topics')->name('topics');
        Route::patch('{id}/add_view', 'add_view')->name('add_view');
        });
}); 

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

