<?php

namespace App\Http\Livewire\Imponente;

use App\Models\Prestamo;
use Livewire\Component;

class SolicitudEdit extends Component
{

    public $solicitud, $hipotecario, $detalle_prestamo, $prestamos, $cuotas;

    protected $rules = [
        'solicitud.monto'         => 'required',
        'detalle_prestamo.cuotas'        => 'required',
        'solicitud.prestamo_id'   => 'required',
    ];

    public function mount(){

        $this->cuotas = $this->solicitud->prestamo->cuotas;

        $this->detalle_prestamo = $this->solicitud->detalle_prestamo;

        $this->hipotecario = Prestamo::where('name', 'PRESTAMO HIPOTECARIO')->first();

        $this->prestamos = Prestamo::where('id', '>', 1)
                                    ->where('active', true)
                                    ->get();
    }

    public function updatedSolicitudPrestamoId($value)
    {

        $prestamo = Prestamo::find($value);

        $this->cuotas = $prestamo->cuotas;

        $this->detalle_prestamo->cuotas = $this->cuotas->first()->value;

    }

    public function updatedDetallePrestamoCuotas($value){
        $this->detalle_prestamo->fecha_vencimiento = $this->solicitud->created_at->addMonth($value);
    }

    public function render()
    {

        return view('livewire.imponente.solicitud-edit');
    }

    public function update(){

        $this->validate();

        $this->solicitud->save();
        
        $this->detalle_prestamo->save();

        $this->emit('saved');
    }
}
