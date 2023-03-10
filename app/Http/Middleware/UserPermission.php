<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = $request->user();

		if ($user === null) {
			return redirect('/');
		}

        if ( $user->id === 1 ) {
			return $next($request);
		}

		$userHasPermission = $user->permissions()->where('slug', $permission)->count();

        if ( $userHasPermission > 0 ) {
			return $next($request);
		}

		$userRolesHasPermission = $user->roles()->whereHas('permissions', function ($query) use ($permission) {
			$query->where('permissions.slug', $permission);
		})->count();

		if ($userRolesHasPermission  > 0 ) {
			return $next($request);
		}
        
		return response("<center><h1>لاتملك الصلاحيات الكافية</h1></center>", 401);
    }
}
