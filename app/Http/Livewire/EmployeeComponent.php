<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Group;

class EmployeeComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $start_date;
    
    public $group_id = '';
    public $employee_id;
    public $role_id;

    protected $rules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required|email',
        'start_date' => 'required',
        'group_id'   => 'required'
    ];

    public function storeEmployee()
    {
        $this->validate();

        Employee::create([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'start_date' => $this->start_date,
            'group_id'   => $this->group_id
        ]);

        $this->reset(['first_name','last_name', 'email', 'start_date', 'group_id']);

        session()->flash('submitted', 'Submitted!');
    }

    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        $this->employee_id      = $employee->id;
        $this->first_name       = $employee->first_name;
        $this->last_name        = $employee->last_name;
        $this->email            = $employee->email;
        $this->start_date       = $employee->start_date;
        $this->group_id         = $employee->group_id;

        // $this->updateEmployee   = true;
    }

    public function updateEmployee()
    {
        $this->validate();

        Employee::find($this->employee_id)->update([
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'start_date'    => $this->start_date,
            'phone_number'  => $this->phone_number,
            'group_id'      => $this->group_id
        ]);

        // $this->updateEmployee = false;
        $this->reset(['first_name','last_name','email', 'start_date', 'group_id']);

        session()->flash('updated', 'Updated!');
    }

    public function render()
    {
        $groups = Group::get();
        $employees = Employee::get();
        
        return view('livewire.employee-component', compact(
            'groups',
            'employees'
        ));
    }
}
