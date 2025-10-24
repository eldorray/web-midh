<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hero', App\Http\Controllers\HeroController::class);
    Route::resource('feature', App\Http\Controllers\FeatureController::class);
    Route::resource('visiMisi', App\Http\Controllers\VisiMisiController::class);
});

require __DIR__.'/auth.php';
