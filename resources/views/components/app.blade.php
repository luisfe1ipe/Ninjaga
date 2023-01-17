<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Ninjaga - @yield('title')
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="stylesheet" href="/css/main.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@800&display=swap"
        rel="stylesheet">


   
</head>

<body>
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL'1,
                'wght'400,
                'GRAD'0,
                'opsz'48
        }
    </style>
    @yield('navbar')
    <div class="container-p">
        <x-toast.message/>
        @yield('content')
    </div>
    @yield('item-view')
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>

    <script src="{{ asset('js/photo-preview.js') }}"></script>

    @yield('scriptBanner')
    @yield('scriptUser')


</body>

</html>
