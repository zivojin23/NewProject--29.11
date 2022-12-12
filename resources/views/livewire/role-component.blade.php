<div>
<div class="w-1/5 mx-auto mt-8">
    @if (session()->has('submitted'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('submitted') }}
        </div>    
    </div>
    @endif
    @if (session()->has('updated'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('updated') }}
        </div>    
    </div>
    @endif
</div>


<div class="flex flex-row">
<div class="w-1/5 mx-auto">
    <form wire:submit.prevent="storeRole">
        @csrf

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="role_name" class="mb-2 mt-10 text-sm font-medium">Role Name</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="role_name" id="role_name" type="text" placeholder="E.g. Officer, Assistant, CEO...">  
            @error('role_name')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col w-4/5 mx-auto my-8">
            <label for="role_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Description</label>
            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                    wire:model="role_description" id="role_description" rows="4" placeholder="Description of the Role"></textarea>
            @error('role_description')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        @if ($updateRole)
            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="updateRole()" type="submit">Update</button>
                <button class="bg-red-500 hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="cancel()">Cancel</button>
            </div>
        @else   
            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="storeRole()" type="submit">Save</button>
            </div>
        @endif


    </form>
</div>

    <div class="mt-10 mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Role ID</th>
                    <th scope="col" class="py-3 px-6">Role Name</th>
                    <th scope="col" class="py-3 px-6">Description</th>
                    <th scope="col" class="py-3 px-6">Last updated</th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $role->id }}</th>
                    <td class="py-4 px-6">{{ $role->role_name }}</td>
                    <td class="py-4 px-6">{{ $role->role_description }}</td>
                    <td class="py-4 px-6">{{ $role->updated_at }}</td>
                    <td class="py-4 px-6 text-right">
                        @can('access_by_system')
                            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                    wire:click="editRole({{ $role->id }})">Edit</button>
                        @endcan
                    </td>    
                </tr>         
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>