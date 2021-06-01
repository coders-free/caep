<?php

namespace App\Http\Livewire\Imponente;

use App\Models\Prestamo;
use App\Models\Solicitud;
use Livewire\Component;

use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudCreate as SolicitudMailable;

class SolicitudCreate extends Component
{

    public $open = false;

    public $type, $imponente, $monto;

    protected $rules = [
        "type"      => 'required',
        "monto"     => 'required|numeric',
    ];

    public function mount(){
        $this->imponente = auth()->user()->imponente;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function open_modal(){
    
        $identificacion = auth()->user()->imponente->identificacion;
        $trabajo = auth()->user()->imponente->trabajo;
        $bancario = auth()->user()->imponente->bancario;

        if ($identificacion->complete && $trabajo->complete && $bancario->complete) {
            $this->open = true;
        }else{
            $this->emit('complete_imponente');
        }

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

        /* if (auth()->user()->email) {
            Mail::to(auth()->user()->email)->send(new SolicitudMailable);
        } */

        return redirect()->route('solicitudes.edit', $solicitud);

    }


    public function render()
    {
        return view('livewire.imponente.solicitud-create');
    }
}
