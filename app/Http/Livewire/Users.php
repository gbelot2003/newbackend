<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{


        
    /**
     * Method read
     *
     * @return void
     */
    public function read()
    {
        return User::OrderBy('id', 'DESC')->paginate(10);
    }

    
    /**
     * Method render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.users', [
            'data' => $this->read(),
        ]);
    }
}
