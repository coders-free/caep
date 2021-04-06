<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAval
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
        return redirect()->route('avales.create');
        $aval_count = auth()->user()->imponente->avales->count();

        if (auth()->user()->imponente->avales->count()) {
            return $next($request);
        } else {
            return redirect()->route('avales.create');
        }
        
    }
}
