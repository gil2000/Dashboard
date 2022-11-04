<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{

    public $search = '';
    use WithPagination;


    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::search($this->search)
                ->simplePaginate(5)
        ]);
    }
}
