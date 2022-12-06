<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UsersTable extends Component
{

    public $user_id;
    public $role_id;

    public bool $updateUserRole = false;



    public function editUser($id)
    {
        $user = User::findOrFail($id);

        $this->updateUserRole = true;
    }

    public function updateUser()
    {
        $check = User::find($this->user_id)->update();

        dd($check->toJson(JSON_PRETTY_PRINT));

        // session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $users = User::get();
        $roles = Role::get();

        return view('livewire.users-table', compact('users', 'roles'));
    }
}
