<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use Livewire\WithPagination;

class CreditoImponente extends Component
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

        return view('livewire.credito-imponente', compact('creditos'));
    }
}
