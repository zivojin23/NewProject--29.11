<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UsersTable extends Component
{

    public $user_id;
    public $role_id;
    public $new_role_id;

    public bool $updateUser = false;




    // public function editUser($id)
    // {
    //     dd('bilo sta pls');
        
    //     // $this->id = auth()->user()->id;

    //     // $user = User::find('id', $user_id);

    //     // $this->role_id = $user->role_id;
    //     // // $this->user_id          = $user->id;

    //     // // $this->first_name   = $user->first_name;
    //     // // $this->last_name    = $user->last_name;
    //     // // $this->email        = $user->email;
    //     // // $this->start_date   = $user->start_date;
    //     // // $this->email        = $user->email;

    //     // $this->updateUser   = true;
    // }


    public function findUser($id)
    {
        $user = User::findOrFail($id);

        $this->user_id    = $user->id;
        $this->role_id    = $user->role_id;
        $this->updateUser = true;




        // dd($user->id);
        // ->toJson(JSON_PRETTY_PRINT)

    }

    public function updateUser()
    {
        // $this->validate();

        $checkk = User::find($this->user_id)->update([
            'role_id'        => $this->new_role_id
        ]);

        // $this->updateRole = false;
        // $this->reset(['role_name','role_description']);

        dd($checkk->toJson(JSON_PRETTY_PRINT));
        // exit;

        session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $users = User::all();
        $roles = Role::all();

        return view('livewire.users-table', compact('users', 'roles'));
    }
}
