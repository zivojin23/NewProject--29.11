<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Group;

class GroupComponent extends Component
{
    public $group_name;
    public $group_description;
    public $employee_id = '';

    protected $rules = [
        'group_name'        => 'required',
        'group_description' => 'required',
        'employee_id'       => 'required'
    ];

    public function storeGroup()
    {
        $this->validate();

        Group::create([
            'group_name'        => $this->group_name,
            'group_description' => $this->group_description,
            'employee_id'       => $this->employee_id
        ]);

        $this->reset(['group_name','group_description', 'employee_id']);

        session()->flash('submitted', 'Submitted!');
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
