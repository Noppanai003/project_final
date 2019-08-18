<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIsRevenue_officer
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
        if (!auth()->user()->isRevenue_officer()) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
