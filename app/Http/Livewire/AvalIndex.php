<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

class AvalIndex extends Component
{

    use WithPagination;

    public $imponente, $search;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $this->imponente = auth()->user()->imponente;
    }

    public function render()
    {
        $avales = $this->imponente->avales()->where('name', 'like', '%' . $this->search . '%')->paginate(6);

        return view('livewire.aval-index', compact('avales'));
    }
}
