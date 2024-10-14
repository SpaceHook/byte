<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['sk', 'uk', 'ru'])) {
            App::setLocale($locale);
            session(['locale' => $locale]); // Зберігаємо локаль у сесії
        } else {
            App::setLocale(session('locale', 'uk')); // Локаль за замовчуванням
        }

        return $next($request);
    }
}
