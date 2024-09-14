<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('', 'index');
    Route::get('index', 'index')->name('index');
    Route::prefix('contact')->group(function () {
        Route::get('', 'contact')->name('contact');
        Route::post('', 'send_message')->name('send_message');
    });
    Route::get('testimonials', 'testimonials')->name('testimonials');
    Route::prefix('topics')->group(function () {
        Route::get('{id}', 'topics_detail')->name('topics_detail');
        Route::get('', 'topics')->name('topics');
        Route::patch('{id}/add_view', 'add_view')->name('add_view');
    });
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* Route::fallback(function () {
return redirect('/welcome');
}); */
