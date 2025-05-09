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
         if ($request->route()->getName() === 'admin.register' && (!Auth::check() || Auth::user()->role !== 'admin')) {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
