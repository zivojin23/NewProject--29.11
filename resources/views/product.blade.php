<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Product</title>

    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>

    <x-nav />

    <div class="p-5 flex justify-center text-center">
        <h1 class="font-bold text-gray-600 text-4xl">
            Products</h1>
    </div>

    <div>
        @livewire('product-component')
    </div>

    @livewireScripts
</body>
</html>