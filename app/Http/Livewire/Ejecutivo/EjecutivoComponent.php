<?php

namespace App\Http\Livewire\Ejecutivo;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Solicitud;

class EjecutivoComponent extends Component
{

    public $search;

    public function render()
    {

        $solicitudes = Solicitud::whereHas('prestamo', function (Builder $query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->whereHas('identificacion.comuna.agencia.ejecutivo', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->where('status', 2)->latest('id')->paginate(10);

        $aprobados = auth()->user()
            ->solicitudes()
            ->where('status', 3)
            ->count();

        $rechazados = auth()->user()
            ->solicitudes()
            ->where('status', 4)
            ->count();


        return view('livewire.ejecutivo.ejecutivo-component', compact('solicitudes', 'aprobados', 'rechazados'))
            ->layout('layouts.ejecutivo');
    }
}
