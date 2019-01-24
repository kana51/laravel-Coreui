<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;

class AllEnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {   

        $guards = array_keys(config('auth.guards'));


        foreach($guards as $guard) {

            if($guard == 'user') {

                if (Auth::guard($guard)->check()) {

                    if (! Auth::guard($guard)->user() ||
                        (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                        ! Auth::guard($guard)->user()->hasVerifiedEmail())) {
                        // dd('ddd');
                        return $request->expectsJson()
                                ? abort(403, 'Your email address is not verified.')
                                : Redirect::route('user.verification.notice');
                    }  

                }
            }
        }

        return $next($request);
    }
}