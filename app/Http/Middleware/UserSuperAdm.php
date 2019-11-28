<?php

namespace App\Http\Middleware;

use Closure;

class UserSuperAdm
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
        $now_user = Auth::user();
        if ($now_user->type_user == 5) {
            return $next($request);
        }
        abort(403);
    }
}
