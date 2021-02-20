<?php

namespace Amin3536\SimpleRolePermission\roleModule;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class RoleAndPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roleAndPermission, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        $rolesOrPermissions = is_array($roleAndPermission)
            ? $roleAndPermission
            : explode('|', $roleAndPermission);


        if ((sizeof($rolesOrPermissions) == 1 && !Auth::guard($guard)->user()->haveRoleAndPermission($rolesOrPermissions[0]))
            ||
            (sizeof($rolesOrPermissions) == 2 && !Auth::guard($guard)->user()->haveRoleAndPermission($rolesOrPermissions[0], $rolesOrPermissions[1]))) {
            throw UnauthorizedException::forRolesOrPermissions($rolesOrPermissions);
        }

        return $next($request);
    }
}
