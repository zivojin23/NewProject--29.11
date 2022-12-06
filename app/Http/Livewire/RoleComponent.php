<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;

class RoleComponent extends Component
{
    public $role_name;
    public $role_description;
    public $role_id;
    public $updateRole = false;

    protected $rules = [
        'role_name'        => 'required',
        // 'role_description' => 'required'
    ];

    public function storeRole()
    {
        $this->validate();

        Role::create([
            'role_name'        => $this->role_name,
            'role_description' => $this->role_description
        ]);

        $this->reset(['role_name','role_description']);

        session()->flash('submitted', 'Submitted!');
    }

    public function editRole($id)
    {
        $role = Role::findOrFail($id);

        $this->role_id           = $role->id;
        $this->role_name         = $role->role_name;
        $this->role_description  = $role->role_description;

        $this->updateRole  = true;
    }

    public function updateRole()
    {
        $this->validate();

        Role::find($this->role_id)->update([
            'role_name'         => $this->role_name,
            'role_description'  => $this->role_description,
        ]);

        $this->updateRole = false;
        $this->reset(['role_name','role_description']);

        session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $roles = Role::get();

        return view('livewire.role-component', compact(
            'roles'
        ));
    }
}
