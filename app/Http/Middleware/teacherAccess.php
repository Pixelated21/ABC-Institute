<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class teacherAccess
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
        if (Auth::user()->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user()->role_id === 2) {
            return $next($request);
        }
        if (Auth::user()->role_id === 3) {
            return redirect()->route('student.dashboard');

        }
        return redirect()->route('prox-login');
    }
}
