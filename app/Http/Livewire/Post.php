<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        return view('livewire.post');
    }

    public function storePost()
    {


    }
}
