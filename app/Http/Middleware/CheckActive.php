<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
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
        $activeUser = Auth::user();
        if ($activeUser->activeUser != 1) {
            return route('login')->with('status','No cuenta con Permisos para acceder');
        }
        return $next($request);
    }
}
