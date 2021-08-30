<?php

namespace App\Http\Middleware;

use App\Responses\ErrorResponse;
use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ?string $roles = null)
    {
        if (empty($roles)) {
            $roles = $this->getRequiredRoleForRoute($request->route());
        } else {
            $roles = strpos($roles, '|') > 0 ? explode('|', $roles) : [$roles];
        }

        /**
         * @var \App\User $user
         */
        $user = $request->user();

        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        // God can do anything.
        if( $user->hasRole( Role::GOD ) || $user->roles()->whereIn( 'type', $roles )->exists() ){

            return $next($request);
        }

        return new ErrorResponse( 403, 'Insufficient Role: You do not have access to this resource.' );
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}