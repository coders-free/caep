<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade

        if (auth()->user()->hasRole('imponente')) {
            return redirect('/');            
        }

        if (auth()->user()->hasRole('ejecutivo')) {
            return redirect()->route('ejecutivo.index');            
        }

        if (auth()->user()->hasRole('administrador')) {
            return redirect()->route('administrador.index');            
        }

        if (auth()->user()->hasRole('reportes')) {
            return redirect()->route('reportes.index');            
        }
        
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }

}