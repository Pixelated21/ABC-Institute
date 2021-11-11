<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class studentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user()->role_id === 2) {
            return redirect()->route('teacher.dashboard');
        }
        if (Auth::user()->role_id === 3) {
            return $next($request);

        }
        return redirect()->route('prox-login');
    }
}
