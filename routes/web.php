<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['sk', 'uk', 'ru'])) {
        session(['locale' => $locale]);
    }

    return redirect()->route('home', ['locale' => session('locale', 'uk')]);
})->name('set-locale');

Route::get('/', function () {
return "Hello, world!"; // Спрощений контент для перевірки
});

// Основні маршрути з префіксом `{locale}`
Route::middleware([App\Http\Middleware\LocaleMiddleware::class])->group(function () {
    Route::prefix('{locale}')->where(['locale' => 'sk|uk|ru'])->group(function () {
        Route::get('/', function () {
            return view('main_page.index');
        })->name('home');
    });
});

// Маршрути для адмін-панелі без префікса локалі
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
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
