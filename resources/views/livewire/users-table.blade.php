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


                @foreach ($users as $user)   


                <tr class="bg-white border-b hover:bg-gray-50" >
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900">{{ $user->id }}</th>
                    <td class="py-4 px-6">{{ $user->first_name }}</td>
                    <td class="py-4 px-6">{{ $user->last_name }}</td>
                    <td class="py-4 px-6">{{ $user->email }}</td>




                    
                    


                        {{-- <livewire:user-profile :user="$user" > --}}

                        {{-- @if ($updateUser)

                            <select  class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                                    wire:model="new_role_id" name="new_role_id" id="new_role_id">
                                  
                                <option value="" disabled selected>Please select one</option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                    @endforeach
                            
                            </select>
                        
                        @else           
                                    
                            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                    wire:click="findUser({{ $user->id }})">find this user</button>
                        
                        @endif  --}}

                        @if ($updateUser)
                            {{-- <input wire:model="new_role_id" type="text"
                                    :wire:key="$user-key-{{ $user->id }}"> --}}

                        <td class="py-4 px-6">
                            <select wire:model="new_role_id" name="new_role_id" id="new_role_id">
                
                                <option value="3">Employee</option>
                                <option value="4">Director</option>
                                <option value="5">Chief</option>
                                {{-- <option value="{{ $role->role_id }}">{{ $role->role_name }}</option> --}}

                            </select>
                        </td>
                        {{-- <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="updateUser()" type="submit">Submit</button> --}}
                        

                        @else
                            <td class="py-4 px-6">{{ $user->role->role_name }}</td>
                        @endif
                            

                        

                    {{-- @foreach ($items as $item)
                        <li wire:key="item-{{ $item->id }}">{{ $item }}</li>
                    @endforeach --}}

                    {{-- @if ($updateUserRole)
                        <div>

                        </div>
                    @endif --}}
                
                    <td class="py-4 px-6 text-right">
                        
                        {{-- <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="findUser({{ $user->id }})">find this user</button>    --}}

                    @if ($updateUser)

                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="updateUser({{ $user->id }})">update role</button>
                    
                    @else           
                                
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="findUser({{ $user->id }})">find this user</button>
                    
                    @endif    
                    
                    </td>

                </tr> 
                
                @endforeach



            </tbody>
        </table>
    </div>
</div>
</div>


