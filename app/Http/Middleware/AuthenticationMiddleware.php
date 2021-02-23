<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(\Auth::guard('staff')->check() || \Auth::guard('client')->check()){
            return $next($request);
        }

        return redirect()->route('authentication.login');

    }
}
