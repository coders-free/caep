<?php

namespace App\Http\Livewire\Ejecutivo;

use App\Models\Aval;
use App\Models\Imponente;
use App\Models\Prestamo;
use App\Models\Solicitud;
use Carbon\Carbon;
use Livewire\Component;

class SolicitudCreate extends Component
{

    public $open = false;

    public $type, $imponentes, $imponente_id, $monto;

    protected $rules = [
        "type"      => 'required',
        "monto"     => 'required',
    ];

    //Propiedades computadas
    public function getImponenteProperty()
    {
        return Imponente::find($this->imponente_id);
    }


    public function mount(){

        $this->imponentes = Imponente::all();
        $this->imponente_id = $this->imponentes->first()->id;
        
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        if ($this->type == 1) {

            $solicitud = Solicitud::create([
                'monto' => $this->monto,
                'imponente_id' => $this->imponente->id,
                'prestamo_id'  => 2
            ]);

            $solicitud->detalle_prestamo()->create([
                'cuotas' => 12,
                'fecha_vencimiento' => $solicitud->created_at->addMonth(12)
            ]);

            $solicitud->identificacion()->create($this->imponente->identificacion->toArray());
            $solicitud->trabajo()->create($this->imponente->trabajo->toArray());
            $solicitud->bancario()->create($this->imponente->bancario->toArray());

            $aval = $solicitud->aval()->create();
            $aval->identificacion()->create();
            $aval->trabajo()->create();
        }else{
            $solicitud = Solicitud::create([
                'monto' => $this->monto,
                'imponente_id' => $this->imponente->id,
                'prestamo_id'  => 1
            ]);
        }

        $solicitud->status = 2;
        $solicitud->save();

        /* return redirect()->route('solicitudes.edit', $solicitud); */
        
        return redirect()->route('ejecutivo.solicitudes.show', $solicitud);

    }

    public function render()
    {

        return view('livewire.ejecutivo.solicitud-create');
    }
}
