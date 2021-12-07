<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPreviousBookingMiddleware
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
        if (auth()->check()) {
            if (cache()->has('prev_session')) {
                if (request()->is('ticket') && (!auth()->user()->country || !auth()->user()->state)) {
                    session()->flash('error', 'You need to update your profile to continue');
                    if ($request->is('user/profile')) return $next($request);

                    return redirect(url('user/profile') . '?edit=true');
                }
            }
            return $next($request);

        }
        return $next($request);
    }
}
