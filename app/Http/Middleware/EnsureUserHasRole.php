<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (Auth::check() && array_key_exists($request->user()->role, config('roles')) && in_array(config('roles')[$request->user()->role], $role)) {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
