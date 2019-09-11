<?php

namespace App\Http\Middleware;

use Closure;

class UserDirProg
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
        $now_user= Auth::user();
        if ($now_user->type_user!=4) {
            abort(403);
        }
        return $next($request);
    }
}
