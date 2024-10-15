<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CourseController;

Route::get('/', function () {
    app()->setLocale('uk'); // Замініть 'uk' на вашу локаль за замовчуванням

    return view('main_page.index');
});

Route::middleware([App\Http\Middleware\LocaleMiddleware::class])->group(function () {
    Route::prefix('{locale}')->where(['locale' => 'sk|uk|ru'])->group(function () {
        Route::get('/', [MainPageController::class, 'index'])->name('main_page.index');
    });
});


// Маршрути для адмін-панелі без префікса локалі
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('news', NewsController::class);
    Route::resource('banners', BannerController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('courses', CourseController::class);
});

Route::get('/dashboard', function () {
    return view('dgashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
