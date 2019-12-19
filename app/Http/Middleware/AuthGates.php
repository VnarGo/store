<?php

namespace Store\Http\Middleware;

use Store\Role;
use Closure;
use Gate;
use Auth;
Use Store\User;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

       if (!app()->runningInConsole() && $user) {
            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function ( User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                    //return array_intersect($user->roles->pluck('id')->toArray(),$roles);
                });
            }
       }

        return $next($request);
    }
}


