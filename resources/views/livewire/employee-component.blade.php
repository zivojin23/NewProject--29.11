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

{{-- <x-aside /> --}}

<div class="flex flex-row">
<div class="w-1/5 mx-auto">
    <form wire:submit.prevent="storeEmployee">
        @csrf

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="first_name" class="mb-2 mt-10 text-sm font-medium">First Name</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="first_name" id="first_name" type="text" placeholder="Your First Name">  
            @error('first_name')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="last_name" class="mb-2 text-sm font-medium">Last Name</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="last_name" id="last_name" type="text" placeholder="Your Last Name">  
            @error('last_name')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="email" class="mb-2 text-sm font-medium">Email</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="email" id="email" type="email" placeholder="Your Email">             
            @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="start_date" class="mb-2 text-sm font-medium">Started working</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="start_date" id="start_date" type="date" placeholder="">             
            @error('start_date')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">      
            <label for="group_id" class="mb-2 text-sm font-medium">Group</label>        
            <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="group_id" id="group_id">
                <option value="" disabled selected>-- Please select one --</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                    @endforeach
            </select>     
            @error('group_id')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="storeEmployee()" type="submit">Save</button>
        </div>

    </form>
</div>

    <div class="mt-10 mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Employee's ID</th>
                    <th scope="col" class="py-3 px-6">First Name</th>
                    <th scope="col" class="py-3 px-6">Last Name</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Started working</th>
                    <th scope="col" class="py-3 px-6">Member of group</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $employee->id }}</th>
                    <td class="py-4 px-6">{{ $employee->first_name }}</td>
                    <td class="py-4 px-6">{{ $employee->last_name }}</td>
                    <td class="py-4 px-6">{{ $employee->email }}</td>
                    <td class="py-4 px-6">{{ $employee->start_date }}</td>
                    <td class="py-4 px-6">{{ $employee->group->group_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>