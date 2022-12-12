<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Step;

class GroupComponent extends Component
{
    public $group_name;
    public $group_description;
    public $group_id;
    public $step_id;
    public $updateGroup = false;
    public $attachGroup = false;

    protected $rules = [
        'group_name'        => 'required',
        'group_description' => 'required',
    ];

    public function storeGroup()
    {
        $this->validate();

        Group::create([
            'group_name'        => $this->group_name,
            'group_description' => $this->group_description,
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

        Group::find($this->group_id)->update([
            'group_name'            => $this->group_name,
            'group_description'     => $this->group_description,
        ]);

        $this->reset(['group_name','group_description']);
        $this->updateGroup = false;
        
        session()->flash('updated', 'Updated!');
    }

    public function cancel()
    {
        $this->reset(['group_name','group_description']);
        $this->updateGroup = false;
    }

    public function ddButton()
    {
        // $grp = Group::all();
        // $steps = Step::all();
        // // $steps = Step::
        // // $prod->steps()->attach()

        // foreach ($grp as $group) {
        //     $group->steps()->attach($steps);
        // }
        // $group = Group::first();
        // $step = Step::first();

        // foreach ($groups as $group) {
        //     $group->steps()->attach($step_id);
        // }

        // $this->attachGroup = true;

        // $groups = Group::all();

        //     foreach ($groups as $group) 
        //     {
        //         $steps = Step::find(1)->take(rand(1,3))->pluck('id');

        //         // dd($groups->toJson(JSON_PRETTY_PRINT));
        //         // exit;

        //         $group->steps()->attach($steps);
        //     }



        $this->attachGroup = true;

        // $groups = Group::all();


        //     foreach ($groups as $group) 
        //     {
        //         $steps = Step::all();

        //         foreach ($steps as $step)
                
        //         // dd($groups->toJson(JSON_PRETTY_PRINT));
        //         // exit;
        //         // dd($steps->toJson(JSON_PRETTY_PRINT));
        //         // exit;

        //         return $group->steps()->attach($step);

        //         // $group->steps()->attach($step);
        //     }





        
        // $user = User::find(1);
        
        // foreach ($user->roles as $role) {
            //

        // dd($step->toJson(JSON_PRETTY_PRINT));
        // exit;
        // dd($group->toJson(JSON_PRETTY_PRINT));
        // exit;

            // $group->steps()->attach($step_id);
            // $this->step_id = $step->id;
        // foreach ($groups as $group) {
        //     $group->steps()->attach($step_id);
        // }


        // $this->group_id = $group->id;
        // $this->group_id = $group->id;

        
        // $group->steps()->attach($group_id);


        // dd($step);

        // $user = User::find(1);
 
        // $user->roles()->attach($roleId);
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
