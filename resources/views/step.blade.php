<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>steps</title>
    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <x-nav />
    
    <div>
        @livewire('step-component')
    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>