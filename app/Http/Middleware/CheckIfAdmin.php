<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
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
        $user = $request->user();

        if (!isset($user)) {
            return redirect('/login');
        }

        if (!$user->isAdmin()) {
//        if ($user->role_id != 1) {
            return redirect('/');
        }
            return $next($request);
    }
}
