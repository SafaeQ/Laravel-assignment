<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if (Auth::user()->role === 'admin') {
            return $next($request);
        }
        if(Auth::user()->role == 'superadmin'){
            return redirect()->route('super.admin.home');
        }
        // if(Auth::user()->role == 'user'){
        //     return $next($request);
        // }
        return redirect('home')->with('error', 'you dont have access you r not Admin');
    }
}
