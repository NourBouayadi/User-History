<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectTo
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

            Log::info("is_admin : ".Auth::user()->is_admin);
            Log::info("id : ".Auth::user()->id);
            if (!Auth::user()->is_admin) {
                return redirect('/')->withErrors('You are not allowed ');
            }

            return $next($request) ;
    }
}
