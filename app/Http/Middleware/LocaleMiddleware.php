<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (!in_array($locale, ['sk', 'ua', 'ru'])) {
            return redirect()->to('/ua' . $request->getRequestUri());
        }

        App::setLocale($locale);
        session(['locale' => $locale]);

        return $next($request);
    }
}
