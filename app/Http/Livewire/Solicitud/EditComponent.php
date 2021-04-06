<?php

namespace App\Http\Livewire\Solicitud;

use App\Models\Prestamo;
use Livewire\Component;

class EditComponent extends Component
{

    public $solicitud, $hipotecario, $detalle_prestamo, $prestamos;

    protected $rules = [
        'solicitud.monto'         => 'required',
        'detalle_prestamo.cuotas'        => 'required',
        'solicitud.prestamo_id'   => 'required',
    ];

    public function mount($solicitud){
        $this->solicitud = $solicitud;
        $this->detalle_prestamo = $solicitud->detalle_prestamo;

        $this->hipotecario = Prestamo::where('name', 'PRESTAMO HIPOTECARIO')->first();

        $this->prestamos = Prestamo::where('id', '>', 1)->get();
    }

    public function updatedSolicitudPrestamoId()
    {
        if ($this->solicitud->prestamo_id == $this->hipotecario->id) {
            $this->detalle_prestamo->cuotas = 60;
        }else{
            $this->detalle_prestamo->cuotas = 12;
        }

    }

    public function updatedDetallePrestamoCuotas($value){
        $this->detalle_prestamo->fecha_vencimiento = $this->solicitud->created_at->addMonth($value);
    }

    public function render()
    {

        return view('livewire.solicitud.edit-component');
    }

    public function update(){

        $this->validate();

        $this->solicitud->save();
        $this->detalle_prestamo->save();

        $this->emit('saved');
    }
}
