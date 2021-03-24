<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // employee認証時、EMPLOYEE_HOMEにリダイレクト
            if ($guard == 'employee')
            {
                return redirect(RouteServiceProvider::EMPLOYEE_HOME);
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
