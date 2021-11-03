<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserOnline
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
        $response = $next($request);
        if (Auth::check() && !Auth::user()->is_online) {
            Auth::logout();
            return redirect()->route('login');
        }
        return $response;
    }
}
