<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 2){
                return redirect()->route('user.dashboard')->with('accessError',"You are already logged in !! You need to logout to access desired page.");
            }
            else{
                return redirect()->route('dashboard')->with('accessError',"You are already logged in !! You need to logout to access desired page.");

            }
        }   

        
        return $next($request);
    }
}
