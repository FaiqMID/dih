<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ManagerMiddleware
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
        if(Auth::check()){
            if(Auth::user()->role == '2'){
                return $next($request);
            } else {
                return redirect('/')->with('message', 'blud youre not a worker');
            }
        } else {
            return redirect('/')->with('message', 'login first!');
        }
    }
}
