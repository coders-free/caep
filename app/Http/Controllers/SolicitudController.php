<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudCreate;

class SolicitudController extends Controller
{

    public function show(Solicitud $solicitud){
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud){
        return view('solicitudes.edit', compact('solicitud'));
    }

    public function update(Solicitud $solicitud){
        $solicitud->status = 2;
        $solicitud->save();

        $correo = auth()->user()->email;
        Mail::to($correo)->send(new SolicitudCreate());

        return redirect('/solicitudes')->with('info', 'Su solicitud a sido enviada a Revisión, un ejecutivo se contactara con Usted. Se ha enviado un correo como respaldo a la siguiente dirección '.$correo);
    }
}
