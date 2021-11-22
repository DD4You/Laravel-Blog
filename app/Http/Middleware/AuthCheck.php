<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedUser') && ($request->path() != 'admin/login')){
            return redirect('admin/login')->with('fail', 'You must be logged in');
        }   
        if(session()->has('LoggedUser') && ($request->path() == 'admin/login' || $request->path() == 'admin/register')){
            return back();
        }
        return $next($request)->header('Cache-control', 'no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
