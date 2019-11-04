<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->is_active == 1) {
                switch (Auth::user()->user_type) {
                    case 2:
                        return $next($request);
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            } else {
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

        return $next($request);
    }
}
