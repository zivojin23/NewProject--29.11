<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>
    
    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>

    <x-nav />
    
    <div class="p-5 flex justify-center text-center">
        <h1 class="font-bold text-gray-600 text-4xl">Dashboard</h1>
    </div>

<div class="container mx-auto flex flex-wrap pt-4 pb-12">

    @can('access_by_system')
        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/role" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Roles</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Five default roles with option to add new if needed</p>
            </a>
        </div>
    @endcan

    @can('access_by_director')
        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/group" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Groups</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Create new group for employees or see what groups are already available</p>
            </a>
        </div>

        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/product" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Products</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Add new product to the list or see relevant information about existing products</p>
            </a>
        </div>
    @endcan
    
    @can('access_by_chief')
        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/employee" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Employees</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    See list of all employees and what group they belong to, or add new employees</p>
            </a>
        </div>
    @endcan

</div>

<div class="w-4/5 mx-auto p-5 font-light border border-b-0 border-gray-200">
    <div class="sm:grid sm:grid-cols-4 flex">

        <div class="flex flex-col">
            <div class="p-3 text-base">
                <p class="py-2 ml-3">User ID</p>
                <p class="py-2 ml-3">First Name</p>
                <p class="py-2 ml-3">Last Name</p>
                <p class="py-2 ml-3">Email</p>
                <p class="py-2 ml-3">Role</p>
            </div>
        </div>

        <div class="sm:pl-10 grid col-span-2">
            <div class="p-3 text-base">
                <p class="py-2 ml-3">{{ $user->id }}</p>
                <p class="py-2 ml-3">{{ $user->first_name }}</p>
                <p class="py-2 ml-3">{{ $user->last_name }}</p>
                <p class="py-2 ml-3">{{ $user->email }}</p>
                <p class="py-2 ml-3">{{ $user->role->role_name }}</p>      
            </div>
        </div>

        <div class="px-4 py-2 flex flex-col justify-between">
            <p class="text-sm italic flex justify-end">{{ $user->updated_at }}</p>
        </div>
    </div>
</div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>