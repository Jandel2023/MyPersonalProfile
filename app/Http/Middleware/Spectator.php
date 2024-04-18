<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Spectator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
    
        if ($request->route()->getName() == 'welcome' || $request->route()->getName() === null) {
            return $next($request);
        }

        if (Auth::check()) {
            if (Auth::user()->role_name !== 'Admin') {
                Session::flash('unauthorized', 'You do not have permission to access this page. Please log out!');
                return redirect()->back();
            } elseif (Auth::user()->role_name === null) {
                Session::flash('unauthorized', 'Your role is not specified. Please contact the administrator.');
                return redirect()->back();
            }
        } else {
            Session::flash('unauthorized', 'You are not logged in.');
            return redirect()->route('login');
        }
      
        return $next($request);
       
    }
}
