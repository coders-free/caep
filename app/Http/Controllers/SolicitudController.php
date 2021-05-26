<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    public function create(){
        
        $prestamos = Prestamo::all();
        return view('solicitudes.create', compact('prestamos'));

    }

    public function store(Request $request){

        $imponente = auth()->user()->imponente;

        $request->validate([
            "monto"         => 'required',
            "cuotas"        => 'required',
            "prestamo_id"   => 'required',
        ]);

        $solicitud = Solicitud::create([
            'imponente_id'      => $imponente->id,
            'fecha_cierre'      => Carbon::now(),
            'monto'             => $request->monto,
            'cuotas'            => $request->cuotas,
            'fecha_vencimiento' => Carbon::now()->addMonth($request->cuotas),
            "prestamo_id"       => $request->prestamo_id,
        ]);

        $solicitud->identificacion()->create($imponente->identificacion->toArray());
        $solicitud->trabajo()->create($imponente->trabajo->toArray());
        $solicitud->bancario()->create($imponente->bancario->toArray());

        return redirect()->route('solicitudes.edit', $solicitud);
    }

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

        return redirect('/solicitudes')->with('info', 'Su solicitud a sido enviada a Revisión, un ejecutivo se contactara con Usted. Se ha enviado un correo como respaldo a la siguiente dirección '.$correo);
    }
}
