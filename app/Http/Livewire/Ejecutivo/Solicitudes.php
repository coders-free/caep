<?php

namespace App\Http\Livewire\Ejecutivo;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Solicitud;

use Livewire\WithPagination;

class Solicitudes extends Component
{

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $solicitudes = Solicitud::query()->where(function($query){
            $query->whereHas('identificacion.comuna.agencia.ejecutivo', function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            })->where('status', 2);
        });

        if ($this->search) {
            $solicitudes->where(function($query){
                
                $query->whereHas('prestamo', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('imponente.user', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('identificacion.comuna', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
                
            });
        }

        $solicitudes = $solicitudes->latest('id')->paginate(10);

        /* $solicitudes = Solicitud::paginate(10); */

        $aprobados = Solicitud::where('user_id', auth()->user()->id)
                                ->where('status', 3)
                                ->count();

        $rechazados = Solicitud::where('user_id', auth()->user()->id)
                                ->where('status', 4)
                                ->count();



        return view('livewire.ejecutivo.solicitudes', compact('solicitudes', 'aprobados', 'rechazados'))
            ->layout('layouts.ejecutivo');
    }
}
