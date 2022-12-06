<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>All Users</title>

    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    
    <x-nav />

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
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $user->id }}</th>
                    <td class="py-4 px-6">{{ $user->first_name }}</td>
                    <td class="py-4 px-6">{{ $user->last_name }}</td>
                    <td class="py-4 px-6">{{ $user->email }}</td>
                    <td class="py-4 px-6">{{ $user->role->role_name }}</td>
                    {{-- <td class="py-4 px-6 text-right">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                            wire:click="assignUserRole({{ $user->id }})">Assign Role</button>
                    </td>     --}}
                </tr>         
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>