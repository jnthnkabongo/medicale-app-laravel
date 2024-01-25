<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class userConnecter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Verification de la session

        if(Auth::user()){
            //Au cas ou ce dernier est connecter on continue
            return $next($request);
        }
        else{
            return redirect()->route('page-404');
        }
    }
}
