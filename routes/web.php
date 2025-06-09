<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.index');
    Route::get('/type/{type}', [FrontController::class, 'type'])->name('front.type');
    Route::get('/part/{part}', [FrontController::class, 'part'])->name('front.part');
    Route::get('/blog/{id}', [FrontController::class, 'blog'])->name('front.blog');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
