<?php

namespace App\Http\Livewire\Imponente;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use Livewire\WithPagination;

class Creditos extends Component
{

    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $creditos = auth()->user()->imponente->creditos()->whereHas('prestamo', function (Builder $query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.imponente.creditos', compact('creditos'));
    }
}
