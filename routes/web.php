<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => ], function () {
Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.index');
    Route::get('/part/{id}', [FrontController::class, 'part'])->name('front.part');
    Route::get('/blog/{id}', [FrontController::class, 'blog'])->name('front.blog');
});
