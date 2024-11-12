<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Перевірка, чи користувач залогінений і має роль "admin"
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/login'); // Перенаправляє на сторінку логіну, якщо користувач не адміністратор
        }

        return $next($request);
    }
}
