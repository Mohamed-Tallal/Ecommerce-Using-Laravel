<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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

        if (!auth()->guard('web')->check()){
            return redirect()->route('user.login')->with('toast_error' ,__('dashboardLang.Please First Login'));
        }
        return $next($request);
    }
}
