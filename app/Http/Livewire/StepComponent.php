<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;
use App\Models\Group;
use App\Models\Product;

class StepComponent extends Component
{
    public $step_name;
    public $step_desc;
    public $product_id = '';

    protected $rules = [
        'step_name'        => 'required',
        'step_desc'        => 'required',
        'product_id'       => 'required'
    ];

    public function storeStep()
    {
        $this->validate();

        Step::create([
            'step_name'      => $this->step_name,
            'step_desc'      => $this->step_desc,
            'product_id'     => $this->product_id,
        ]);

        $this->reset(['step_name','step_desc', 'product_id']);

        session()->flash('submitted', 'Submitted!');
    }

    public function render()
    {
        $products = Product::get();
        $steps = Step::get();
        return view('livewire.step-component', compact('steps', 'products'));
    }
}
