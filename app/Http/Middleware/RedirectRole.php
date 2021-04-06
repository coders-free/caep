<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectRole
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
                
        if (auth()->user()->hasRole('ejecutivo')) {
            return redirect()->route('ejecutivo.index');            
        }

        return $next($request);
    }
}
