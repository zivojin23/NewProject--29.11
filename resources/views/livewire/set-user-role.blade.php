<div>
<div class="w-1/5 mx-auto mt-8">
    @if (session()->has('updated'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('updated') }}
        </div>    
    </div>
    @endif
</div>

<div class="mt-10 mx-auto">
    <table class="w-full text-sm text-left text-gray-500">
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
            <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr-{{ $user->id }}">
                
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap" wire:key="th-{{$user->id}}">{{ $user->id }}</th>
                <td class="py-4 px-6" wire:key="td1-{{$user->id}}">{{ $user->first_name }}</td>
                <td class="py-4 px-6" wire:key="td2-{{$user->id}}">{{ $user->last_name }}</td>
                <td class="py-4 px-6" wire:key="td3-{{$user->id}}">{{ $user->email }}</td>
                
                @if ($editMode)
                    <td class="py-4 px-6" wire:key="td4-{{$user->id}}">
                        <select wire:model="role_id" name="role_id" id="role_id" wire:key="roleselect-{{ $user->id }}">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" wire:key="option-{{$user->id}}" >{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </td>
                @else
                    <td class="py-4 px-6" wire:key="td5-{{$user->id}}">{{ $user->role->role_name }}</td>
                @endif
                    

                <td class="py-4 px-6 text-right" wire:key="td6-{{$user->id}}">
                    @if ($editMode)
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="updateUserRole({{ $user->id }})" wire:key="button-{{$user->id}}">Save</button>
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="cancel()" wire:key="cutton-{{$user->id}}">Cancel</button>
                    @else
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="editUserRole({{ $user->id }})" wire:key="tutton-{{$user->id}}">Edit role</button>
                    @endif
                </td>

            </tr>
            @endforeach  
        </tbody>
    </table>
</div>


  
</div>

