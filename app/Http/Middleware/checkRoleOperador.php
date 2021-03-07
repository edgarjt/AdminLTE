<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkRoleOperador
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
        if (Auth::User()->role == 0 && Auth::User()->state == 0 || Auth::User()->state == 1) {
            return $next($request);
        }

        return redirect('/home');
    }
}
