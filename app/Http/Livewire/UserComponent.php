<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UserComponent extends Component
{
    public $user;
    public $user_id;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {   
        $users = User::get();
        $roles = Role::get();

        return view('livewire.user-component', compact('users', 'roles'));
    }
}
