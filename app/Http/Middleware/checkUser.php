<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->isAdmin() || auth()->user()->role == 'superAdmin'){
            return $next($request);
        }
        return redirect('/');
    }
}