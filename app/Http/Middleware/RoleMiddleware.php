<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles  // роли через запятую
     * @return mixed
     */

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $userRoleName = $user->role?->name;

        if (!in_array($userRoleName, $roles)) {
            abort(403, 'У вас нет доступа');
        }
        return $next($request);
    }
}
