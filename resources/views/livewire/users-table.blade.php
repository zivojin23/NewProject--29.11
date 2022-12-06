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

<div>
    <div class="mt-10 mx-auto">
        <table class="w-2/1 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">User ID</th>
                    <th scope="col" class="py-3 px-6">First Name</th>
                    <th scope="col" class="py-3 px-6">Last Name</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Role</th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
                </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr class="bg-white border-b hover:bg-gray-50" >
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900">{{ $user->id }}</th>
                    <td class="py-4 px-6">{{ $user->first_name }}</td>
                    <td class="py-4 px-6">{{ $user->last_name }}</td>
                    <td class="py-4 px-6">{{ $user->email }}</td>

                @if ($updateUserRole)
                    <td class="py-4 px-6">
                        <select wire:model="role_id" name="role_id" id="role_id" :wire:key="select-role-{{ $user->id }}">
                            
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                            
                        </select>
                    </td>                  
                @else
                    <td class="py-4 px-6">{{ $user->role->role_name }}</td>
                @endif            
            
                    <td class="py-4 px-6 text-right">

                    @if ($updateUserRole)
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="updateUser({{ $user->role_id }})">Update role</button>  
                    @else                        
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="editUser({{ $user->id }})">Edit user's role</button>
                    @endif    
                    
                    </td>
                </tr> 
            @endforeach

            </tbody>
        </table>
    </div>
</div>
</div>


