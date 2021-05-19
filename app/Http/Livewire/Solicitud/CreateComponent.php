<?php

namespace App\Http\Livewire\Solicitud;

use App\Mail\SolicitudCreate;
use App\Models\Aval;
use App\Models\Prestamo;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreateComponent extends Component
{

    public $monto, $cuotas, $prestamo_id, $hipotecario, $aval_id;

    protected $rules = [
        "monto"         => 'required|numeric',
        "cuotas"        => 'required|numeric',
        "prestamo_id"   => 'required',
        "aval_id"       => 'required|numeric',
    ];

    public function mount(){
        $this->hipotecario = Prestamo::where('name', 'PRESTAMO HIPOTECARIO')->first();
    }

    public function updatedPrestamoId()
    {
        if ($this->prestamo_id == $this->hipotecario->id) {
            $this->cuotas = 60;
        }else{
            $this->cuotas = 12;
        }

    }

    public function save(){
        $this->validate();

        $imponente = auth()->user()->imponente;
        $aval = Aval::find($this->aval_id);

        $solicitud = Solicitud::create([
            'imponente_id'      => $imponente->id,
            'fecha_cierre'      => Carbon::now(),
            'monto'             => $this->monto,
            'cuotas'            => $this->cuotas,
            'fecha_vencimiento' => Carbon::now()->addMonth($this->cuotas),
            "prestamo_id"       => $this->prestamo_id,
        ]);

        $solicitud->identificacion()->create($imponente->identificacion->toArray());
        $solicitud->trabajo()->create($imponente->trabajo->toArray());
        $solicitud->bancario()->create($imponente->bancario->toArray());

        $sol_aval = $solicitud->aval()->create($aval->toArray());

        $sol_aval->identificacion()->create($aval->identificacion->toArray());
        $sol_aval->trabajo()->create($aval->trabajo->toArray());

        if (auth()->user()->email) {
            Mail::to(auth()->user()->email)->send(new SolicitudCreate);
        }


        return redirect()->route('solicitudes.edit', $solicitud);
    }

    public function render()
    {

        $prestamos = Prestamo::all();
        $avales = auth()->user()->imponente->avales;

        return view('livewire.solicitud.create-component', compact('prestamos', 'avales'));
    }
}
