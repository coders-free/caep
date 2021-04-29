<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->hasRole('imponente')) {
            return redirect('/imponente');            
        }

        if (auth()->user()->hasRole('ejecutivo')) {
            return redirect()->route('ejecutivo.index');            
        }
    }
}
