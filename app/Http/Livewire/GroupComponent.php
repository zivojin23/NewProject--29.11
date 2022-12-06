<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Group;

class GroupComponent extends Component
{
    public $group_name;
    public $group_description;
    public $group_id;
    public $updateGroup = false;
    // public $employee_id = '';

    protected $rules = [
        'group_name'        => 'required|unique:groups',
        'group_description' => 'required',
        // 'employee_id'       => 'required'
    ];

    public function storeGroup()
    {
        $this->validate();

        Group::create([
            'group_name'        => $this->group_name,
            'group_description' => $this->group_description,
            // 'employee_id'       => $this->employee_id
        ]);

        $this->reset(['group_name','group_description']);

        session()->flash('submitted', 'Submitted!');
    }

    public function editGroup($id)
    {
        $group = Group::findOrFail($id);

        $this->group_id             = $group->id;
        $this->group_name           = $group->group_name;
        $this->group_description    = $group->group_description;

        $this->updateGroup          = true;
    }

    public function updateGroup()
    {
        $this->validate();

        Employee::find($this->group_id)->update([
            'group_name'            => $this->group_name,
            'group_description'     => $this->group_description,
            // 'email'         => $this->email,
            // 'start_date'    => $this->start_date,
            // 'phone_number'  => $this->phone_number,
            // 'group_id'      => $this->group_id
        ]);

        // $this->updateEmployee = false;
        // $this->reset(['first_name','last_name','email', 'start_date', 'group_id']);

        session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $groups = Group::get();
        $employees = Employee::get();

        return view('livewire.group-component', compact(
            'groups',
            'employees'
        ));
    }
}
