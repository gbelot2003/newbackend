<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{


    /**
     * The read function
     * 
     * @return void
     */
    public function read()
    {
        return User::paginate(5);
    }


    public function render()
    {
        return view('livewire.users', [
            'data' => $this->read(),
        ]);
    }
}
