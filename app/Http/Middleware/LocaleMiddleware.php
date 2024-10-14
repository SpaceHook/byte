<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Отримуємо перший сегмент URL як локаль
        $locale = $request->segment(1);

        // Якщо локаль є допустимою, встановлюємо її
        if (in_array($locale, ['sk', 'uk', 'ru'])) {
        App::setLocale($locale);
        Session::put('locale', $locale);
        } else {
        // Якщо локаль не вказана, встановлюємо `uk` за замовчуванням
        App::setLocale('uk');
        }

        return $next($request);
    }
}
