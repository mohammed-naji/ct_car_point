<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/part/{id}', [FrontController::class, 'part'])->name('front.part');
Route::get('/blog/{id}', [FrontController::class, 'blog'])->name('front.blog');
