<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotEntrepreneur
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'entrepreneur')
	{
	    if (!Auth::guard($guard)->check()) {
	        return redirect('entrepreneur/login');
	    }

	    return $next($request);
	}
}