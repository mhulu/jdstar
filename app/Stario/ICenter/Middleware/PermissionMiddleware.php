<?php

namespace Star\ICenter\Middleware;

use Auth;
use Closure;

class PermissionMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $permission) {
		if (Auth::guest()) {
			return redirect('/login');
		}
		if (!$request->user()->can($permission)) {
			abort(401);
		}
		return $next($request);
	}
}
