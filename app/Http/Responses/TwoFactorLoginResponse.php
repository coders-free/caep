<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        if ($request->wantsJson()) {
            return response('', 204);
        }

        foreach (Auth::user()->roles as $role) {
            
            switch ($role->name) {
                case 'imponente':
                    return redirect()->intended('/');
                case 'ejecutivo':
                    return redirect()->intended('/ejecutivo');
                case 'administrador':
                    return redirect()->intended('/');
            }

        }
    }
}