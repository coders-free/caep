<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusSolicitudMailable;
use Livewire\Component;

class AprobarSolicitud extends Component
{

    public $solicitud, $status, $mensaje;

    protected $rules = [
        'solicitud.status' => "required",
        'mensaje' => 'required'
    ];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function update(){
        $this->validate();

        $this->solicitud->user_id = auth()->user()->id;


        $imponente = $this->solicitud->imponente->user;

        if ($imponente->email) {
            Mail::to($imponente->email)->send(new StatusSolicitudMailable($this->solicitud->status, $this->mensaje));
        }

        $this->solicitud->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.aprobar-solicitud');
    }
}
