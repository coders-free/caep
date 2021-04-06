<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImponenteController extends Controller
{
    public function index(){
        return view('imponente.show');
    }
}
