<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Login
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
        if (!session()->has('login')) {
            return redirect('employee/login');
        }

        return $next($request);
    }
}
