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

    <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
        <a href="/role" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-red-100">        
            <h5 class="mb-2 text-2xl font-bold text-gray-700">Roles</h5>
            <p class="w-full font-normal text-gray-700 pt-4">In progress</p>
        </a>
    </div>

    <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
        <a href="/employee" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
            <h5 class="mb-2 text-2xl font-bold text-gray-700">Employees</h5>
            <p class="w-full font-normal text-gray-700 pt-4">
                See list of all employees and what group they belong to, or add new employees</p>
        </a>
    </div>

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

</div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>