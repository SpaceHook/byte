<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\CoursePageController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\FormSubmissionController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware([LocaleMiddleware::class])->group(function () {
    Route::prefix('{locale}')->where(['locale' => 'sk|ua|ru'])->group(function () {
        Route::get('/', [MainPageController::class, 'index'])->name('main_page.index');
        Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');

        Route::get('/course-{id}', [CoursePageController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('course.show');
    });

    Route::get('/', function () {
        return redirect('/ua');
    });
});

Route::get('/logout', function () {
    return redirect('/');
})->name('logout.redirect');

Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::resource('banners', BannerController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('courses', CourseController::class);
    Route::resource('info', InfoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('submissions', FormSubmissionController::class)->only(['index', 'destroy']);
    Route::resource('seo', SeoController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
