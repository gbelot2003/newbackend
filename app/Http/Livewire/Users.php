<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    public $showSuspendModal = false;
    public $user;
    public $userId;
    public $email;
    public $username;

        
    /**
     * Method clean
     *
     * @return void
     */
    public function cleanVariables()
    {
        $this->userId = null;
        $this->email = null;
        $this->username = null;
    }

    /**
     * The data from model maped!
     */
    public function dataModel()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
    
    public function openSuspendModal()
    {
        $data = User::find($this->userId);
        $this->email = $data->email;
        $this->username = $data->username;
    }

    public function loadSuspendModal($id)
    {
        $this->userId = $id;
        $this->showSuspendModal = true;
        $this->openSuspendModal();
    }
        
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
