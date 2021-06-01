<?php

namespace App\Http\Livewire\Imponente;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use Livewire\WithPagination;

class Solicitudes extends Component
{

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getSolicitudesProperty()
    {
        return auth()->user()->imponente->solicitudes()
                            ->whereHas('prestamo', function (Builder $query) {
                                $query->where('name', 'like', '%' . $this->search . '%');
                            })->latest('id')->paginate(10);
    }

    public function render()
    {

        return view('livewire.imponente.solicitudes');
    }
}
