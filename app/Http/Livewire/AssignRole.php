<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class AssignRole extends Component
{
    public $user_id;
    public $role_id;

    public $updateUser = false;

    public function roleAssignment($id)
    {
        $user = User::findOrFail($id);

        $this->user_id     = $user->id;
        $this->role_id     = $user->role_id;

        $this->updateUser = true;

        // dd($user);
        // ->toJson(JSON_PRETTY_PRINT)

    }

    public function render()
    {
        return view('livewire.assign-role');
    }
}
