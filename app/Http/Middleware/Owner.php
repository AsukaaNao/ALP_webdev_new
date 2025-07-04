<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Owner
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->isOwner()){
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}
