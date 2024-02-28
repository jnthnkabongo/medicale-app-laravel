<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class laboConnecter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verification si l'utilisateur est connecter
        if (Auth::user()) {
            // Au cas ou ce dernier est connecter on continue...
            return $next($request);
        }else {
            // AU cas contraire il tombera sur la page 404
            return redirect()->to_route('page-404');
        }

    }
}
