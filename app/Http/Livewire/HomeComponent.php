<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class HomeComponent extends Component
{

    public $search;

    public function getSolicitudesProperty()
    {
        return auth()->user()->imponente->solicitudes()
                            ->whereHas('prestamo', function (Builder $query) {
                                $query->where('name', 'like', '%' . $this->search . '%');
                            })->latest('id')->paginate(10);
    }

    public function render()
    {

        return view('livewire.home-component');
    }
}
