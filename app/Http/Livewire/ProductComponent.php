<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductComponent extends Component
{
    public $product_name;
    public $product_description;
    public $product_value;

    protected $rules = [
        'product_name'        => 'required',
        'product_description' => 'required',
        'product_value'       => 'required'
    ];

    public function storeProduct()
    {
        $this->validate();

        Product::create([
            'product_name'        => $this->product_name,
            'product_description' => $this->product_description,
            'product_value'       => $this->product_value
        ]);

        $this->reset(['product_name','product_description', 'product_value']);

        session()->flash('submitted', 'Submitted!');
    }

    public function render()
    {
        $products = Product::get();

        return view('livewire.product-component', compact(
            'products'
        ));
    }
}
