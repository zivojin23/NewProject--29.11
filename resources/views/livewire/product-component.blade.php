<div>
<div class="w-1/5 mx-auto mt-8">
    @if (session()->has('submitted'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('submitted') }}
        </div>    
    </div>
    @endif
</div>

<div class="flex flex-row">
<div class="w-1/5 mx-auto">
    <form wire:submit.prevent="storeProduct">
        @csrf

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="product_name" class="mb-2 mt-10 text-sm font-medium">Product Name</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="product_name" id="product_name" type="text" placeholder="Name of the Product">  
            @error('product_name')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>
`
        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="product_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                    wire:model="product_description" id="product_description" rows="4" placeholder="Description of the Product"></textarea>
            @error('product_description')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="product_value" class="mb-2 text-sm font-medium">Value</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="product_value" id="product_value" type="text" placeholder="Value of the Product">  
            @error('product_value')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        {{-- <div class="flex flex-col w-4/5 mx-auto my-8">
           <p class="text-center text-red-500 font-bold">STEPS</p> 
        </div> --}}

        {{-- <div>
            @livewire('step-component')
        </div> --}}



        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="storeProduct()" type="submit">Save</button>
        </div>

    </form>
</div>

    <div class="mt-10 mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Product ID</th>
                    <th scope="col" class="py-3 px-6">Product Name</th>
                    <th scope="col" class="py-3 px-6">Description</th>
                    <th scope="col" class="py-3 px-6">Product Value</th>
                    <th scope="col" class="py-3 px-6">Steps</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->id }}</th>
                    <td class="py-4 px-6">{{ $product->product_name }}</td>
                    <td class="py-4 px-6">{{ $product->product_description }}</td>
                    <td class="py-4 px-6">{{ $product->product_value }}</td>

                    <td class="py-4 px-6">
                        @foreach ($product->steps as $step)
                        {{ $step->step_name }}
                        <br>
                    @endforeach
                    </td>



                    {{-- <td class="py-4 px-6">{{ $product->steps }}</td> --}}

                    {{-- <td class="py-4 px-6">
                        @foreach ($group->employees as $employee)
                            {{ $employee->first_name }}
                            {{ $employee->last_name }}
                                <br>
                        @endforeach
                    </td> --}}
                </tr>         
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>