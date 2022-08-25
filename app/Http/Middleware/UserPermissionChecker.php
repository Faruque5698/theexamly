<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class UserPermissionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

       $user = Auth::user();

       //$user->isAbleTo($permission);

    if($user->isAbleTo($permission)){
      return $next($request);
    }
       abort(404);
    }
}
