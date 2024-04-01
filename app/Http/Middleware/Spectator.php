<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Spectator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->role_name == 'Spectator') {
                Session::flash('unauthorized', 'You do not have permission to access this page.');
                return redirect()->back();
            } elseif (auth()->user()->role_name === null) {
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
