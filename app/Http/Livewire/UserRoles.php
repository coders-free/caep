<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UserRoles extends Component
{

    use WithPagination;

    public $search, $user;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(User $user)
    {

        $this->user = $user;
        $this->open = true;
    }


    public function update()
    {
    }

    public function render()
    {

        $users = User::where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                })->where('id', '!=', auth()->user()->id)
                    ->latest('id')
                    ->paginate(10);

        return view('livewire.user-roles', compact('users'));
    }
}
