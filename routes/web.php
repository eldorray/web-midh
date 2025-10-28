<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbRegistrationController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index');
Route::get('/blog-list', [App\Http\Controllers\FrontController::class, 'blogList'])->name('front.partials.blog-list');
Route::get('/teacher-list', [App\Http\Controllers\FrontController::class, 'teacherList'])->name('front.partials.teacher-list');
Route::get('/blog-detail/{slug}', [App\Http\Controllers\FrontController::class, 'blogDetail'])->name('front.partials.blog-detail');
Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'aboutUs'])->name('front.partials.about');
Route::get('/contact-us', [App\Http\Controllers\FrontController::class, 'contactUs'])->name('front.partials.contact');


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hero', App\Http\Controllers\HeroController::class);
    Route::resource('feature', App\Http\Controllers\FeatureController::class);
    Route::resource('visiMisi', App\Http\Controllers\VisiMisiController::class);
    Route::resource('teacher', App\Http\Controllers\TeacherController::class);
    Route::resource('blog', App\Http\Controllers\BlogController::class);

    Route::get('/admin/ppdb', [PpdbRegistrationController::class, 'adminIndex'])->name('ppdb.admin.index');
    Route::get('/admin/ppdb/{id}', [PpdbRegistrationController::class, 'adminShow'])->name('ppdb.admin.show');
    Route::get('/admin/ppdb/{id}/edit', [PpdbRegistrationController::class, 'adminEdit'])->name('ppdb.admin.edit');
    Route::put('/admin/ppdb/{id}', [PpdbRegistrationController::class, 'adminUpdate'])->name('ppdb.admin.update');
    Route::post('/admin/ppdb/{id}/approve', [PpdbRegistrationController::class, 'approve'])->name('ppdb.admin.approve');
    Route::post('/admin/ppdb/{id}/reject', [PpdbRegistrationController::class, 'reject'])->name('ppdb.admin.reject');
    Route::delete('/admin/ppdb/{id}', [PpdbRegistrationController::class, 'destroy'])->name('ppdb.admin.destroy');
});



require __DIR__.'/auth.php';
