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
    <form wire:submit.prevent="storeGroup">
        @csrf

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="group_name" class="mb-2 mt-10 text-sm font-medium">Group Name</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="group_name" id="group_name" type="text" placeholder="Name of the Group">  
            @error('group_name')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="group_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                    wire:model="group_description" id="group_description" rows="4" placeholder="Description of the Group"></textarea>
            @error('group_description')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        {{-- <div class="flex flex-col w-4/5 mx-auto my-8">      
            <label for="employee_id" class="mb-2 text-sm font-medium">Employee</label>        
            <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="employee_id" id="employee_id">
                <option value="" disabled selected>-- Select employee for this group --</option>
                                   
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->first_name }}
                            {{ $employee->last_name }}
                        </option>
                    @endforeach

            </select>     
            @error('employee_id')<span class="text-red-600">{{ $message }}</span>@enderror
        </div> --}}

        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="storeGroup()" type="submit">Save</button>
        </div>

    </form>
</div>

    <div class="mt-10 mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Group ID</th>
                    <th scope="col" class="py-3 px-6">Group Name</th>
                    <th scope="col" class="py-3 px-6">Description</th>
                    <th scope="col" class="py-3 px-6">Group members</th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $group->id }}</th>
                    <td class="py-4 px-6">{{ $group->group_name }}</td>
                    <td class="py-4 px-6">{{ $group->group_description }}</td>

                    <td class="py-4 px-6">
                        @foreach ($group->employees as $employee)
                            {{ $employee->first_name }}
                            {{ $employee->last_name }}
                                <br>
                        @endforeach
                    </td>
                    <td class="py-4 px-6 text-right">
                        @can('group_edit')
                            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                    wire:click="editGroup({{ $group->id }})">Edit</button>   
                        @endcan
                        
                    </td>
                </tr>         
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>