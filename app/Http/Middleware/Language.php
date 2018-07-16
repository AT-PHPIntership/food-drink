<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \App::setLocale(session('locale'), config('app.locale'));
        return $next($request);
    }
}
