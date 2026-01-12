<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PpdbRegistrationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\SchoolSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Front pages
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/blog-list', [FrontController::class, 'blogList'])->name('front.partials.blog-list');
Route::get('/teacher-list', [FrontController::class, 'teacherList'])->name('front.partials.teacher-list');
Route::get('/blog-detail/{slug}', [FrontController::class, 'blogDetail'])->name('front.partials.blog-detail');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('front.partials.about');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('front.partials.contact');

// Public PPDB Routes
Route::prefix('ppdb')->group(function () {
    Route::get('/', [PpdbRegistrationController::class, 'index'])->name('ppdb.index');
    Route::post('/check', [PpdbRegistrationController::class, 'checkRegistration'])->name('ppdb.check');
    Route::get('/daftar', [PpdbRegistrationController::class, 'create'])->name('ppdb.create');
    Route::post('/daftar', [PpdbRegistrationController::class, 'store'])->name('ppdb.store');
    Route::get('/edit/{id}', [PpdbRegistrationController::class, 'editFront'])->name('ppdb.edit');
    Route::put('/edit/{id}', [PpdbRegistrationController::class, 'updateFront'])->name('ppdb.update');
    Route::get('/sukses', [PpdbRegistrationController::class, 'success'])->name('ppdb.success');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Content Management
        Route::resource('hero', HeroController::class);
        Route::resource('feature', FeatureController::class);
        Route::resource('visiMisi', VisiMisiController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('blog', BlogController::class);

        // PPDB Management
        Route::prefix('ppdb')->name('ppdb.')->group(function () {
            Route::get('/', [AdminPpdbController::class, 'index'])->name('index');
            Route::get('/export', [AdminPpdbController::class, 'export'])->name('export');
            Route::get('/{id}', [AdminPpdbController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AdminPpdbController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminPpdbController::class, 'update'])->name('update');
            Route::post('/{id}/approve', [AdminPpdbController::class, 'approve'])->name('approve');
            Route::post('/{id}/reject', [AdminPpdbController::class, 'reject'])->name('reject');
            Route::post('/{id}/reset', [AdminPpdbController::class, 'resetStatus'])->name('reset');
            Route::delete('/{id}', [AdminPpdbController::class, 'destroy'])->name('destroy');
        });

        // School Settings
        Route::get('/settings', [SchoolSettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SchoolSettingController::class, 'update'])->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| Legacy Routes (Backward Compatibility)
|--------------------------------------------------------------------------
| These routes maintain backward compatibility with existing links.
| Consider removing these after updating all views and links.
*/

Route::middleware('auth')->group(function () {
    // Legacy resource routes (without admin prefix)
    Route::resource('hero', HeroController::class)->names([
        'index' => 'hero.index',
        'create' => 'hero.create',
        'store' => 'hero.store',
        'show' => 'hero.show',
        'edit' => 'hero.edit',
        'update' => 'hero.update',
        'destroy' => 'hero.destroy',
    ]);
    Route::resource('feature', FeatureController::class);
    Route::resource('visiMisi', VisiMisiController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('blog', BlogController::class);
});

require __DIR__.'/auth.php';
