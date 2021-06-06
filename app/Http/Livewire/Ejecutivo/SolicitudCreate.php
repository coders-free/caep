<?php

namespace App\Http\Livewire\Ejecutivo;

use App\Models\Aval;
use App\Models\Comuna;
use App\Models\Imponente;
use App\Models\Prestamo;
use App\Models\Region;
use App\Models\Solicitud;
use Carbon\Carbon;
use Livewire\Component;

class SolicitudCreate extends Component
{

    public $open = false;

    public $type, $rut, $monto;

    public $region_id, $comuna_id;

    protected $rules = [
        "type"      => 'required',
        "monto"     => 'required',
        "rut"       => 'required|exists:imponentes,rut',
        "region_id" => 'required',
        "comuna_id" => 'required',
    ];

    protected $messages = [
        'type.required' => 'Debe seleccionar un tipo de solicitud.',
        'monto.required' => 'Debe introducir un monto.',
    ];

    protected $validationAttributes = [
        'region_id' => 'region',
        'comuna_id' => 'comuna',
    ];

    public function mount(){
        $this->region_id = "";
        $this->comuna_id = "";
    }

    public function getComunasProperty()
    {
        return Comuna::where('region_id', $this->region_id)->get();
        
    }

    public function getImponenteProperty()
    {
        return Imponente::where('rut', $this->rut)->first();
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

            $identificacion = $this->imponente->identificacion;
            $identificacion->region_id = $this->region_id;
            $identificacion->comuna_id = $this->comuna_id;

            $solicitud->identificacion()->create($identificacion->toArray());
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
        
        return redirect()->route('ejecutivo.solicitudes.show', $solicitud);

    }

    public function render()
    {

        $regiones = Region::all();

        return view('livewire.ejecutivo.solicitud-create', compact('regiones'));
    }
}
