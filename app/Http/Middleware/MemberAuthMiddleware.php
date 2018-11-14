<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;
use Session;
class MemberAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if (is_Mobile())
                {
                    return redirect()->guest('m/login');
                }
                    return redirect()->guest('m/login');

            }
        }

        if(Session::getId() != Auth::guard($guard)->user()->last_session){

            if (is_Mobile())
            {
                return redirect()->guest('m/logout');
            }
                return redirect()->guest('m/logout');

        }

        return $next($request);
    }
}
