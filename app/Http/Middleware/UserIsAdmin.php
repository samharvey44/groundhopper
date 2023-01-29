<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use App\Models\Role;

use Closure;
use Auth;

class UserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$user = Auth::user()) {
            // The user will be redirected by auth middleware, we don't need to do anything.
            return $next($request);
        }

        if (!$user->hasRole([Role::SUPER_ADMIN, Role::ADMIN])) {
            abort(403);
        }

        return $next($request);
    }
}
