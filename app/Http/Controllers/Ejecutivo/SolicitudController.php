<?php

namespace App\Http\Controllers\Ejecutivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Solicitud;

class SolicitudController extends Controller
{
    public function show(Solicitud $solicitud){
        return view('ejecutivo.solicitudes.show', compact('solicitud'));
    }
}
