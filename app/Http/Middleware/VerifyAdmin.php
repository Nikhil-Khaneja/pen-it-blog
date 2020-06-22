<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class VerifyAdmin
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
        if(!auth()->user()->isAdmin()) {
            return redirect(abort(401));
        }
        return $next($request);
    }
}
