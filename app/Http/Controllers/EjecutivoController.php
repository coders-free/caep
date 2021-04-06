<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjecutivoController extends Controller
{
    public function index(){
        return view('ejecutivo.index');
    }
}
