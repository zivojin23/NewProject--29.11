<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class SetUserRole extends Component
{
    public $user;
    public $user_id;
    public $role_id;

    public $editMode = false;

    public function mount()
    {
        $this->user = User::get();
    }

    public function cancel()
    {
        $this->editMode = false;
    }

    public function editUserRole($id)
    {
        $user = User::findOrFail($id);

        $this->user_id     = $user->id;
        $this->role_id     = $user->role_id;
        $this->editMode    = true;
    }

    public function updateUserRole()
    {
        User::find($this->user_id)->update([
            'role_id'   => $this->role_id
        ]);

        $this->editMode  = false;

        session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $users = User::get();
        $roles = Role::get();

        return view('livewire.set-user-role', compact('users', 'roles'));
    }
}
