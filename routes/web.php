<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\FormSubmissionController;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Controllers\FormController;

Route::middleware([LocaleMiddleware::class])->group(function () {
    Route::prefix('{locale}')->where(['locale' => 'sk|uk|ru'])->group(function () {
        Route::get('/', [MainPageController::class, 'index'])->name('main_page.index');
        Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');
    });

    Route::get('/', function () {
        return redirect('/uk');
    });
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('banners', BannerController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('courses', CourseController::class);
    Route::resource('info', InfoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('submissions', FormSubmissionController::class)->only(['index', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
