<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class IsTrainer
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
     if (Auth::user() &&  (Auth::user()->role == 'tenaga_kesehatan' || Auth::user()->role == 'trainer' || Auth::user()->role == 'admin')) {
            return $next($request);
     }

     return redirect()->route('home')->with('error', 'teacher / admin / super-admin only');
}
}
