<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPreviousBookingMiddleware
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
        if(cache()->has('prev_session')){
            return redirect('ticket');
        }
        return $next($request);
    }
}
