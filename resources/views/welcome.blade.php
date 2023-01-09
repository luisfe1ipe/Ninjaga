<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="stylesheet" href="/css/main.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>


    <x-navbar view="concluidos" />

    <div class="container-p">
        <div class="card-manga">
            <div class="img">
                <x-dropdown.menu>
                    <x-dropdown.li route="">Editar</x-dropdown.li>
                </x-dropdown.menu>

                <div class="type">
                    <img src="{{ asset('img/type-manwha.png') }}" alt="">
                </div>

                <a href="">
                    <img class="photo-manga" src="{{ asset('img/Survival-Story-of-a-Sword-King-e1653008962771.jpg') }}" alt="">
                </a>
            </div>
            <div class="title">
                <p>Survival Story of a Sword King in a Fantasy World</p>
            </div>
            {{-- <div class="star"></div> --}}
            <div class="caps">
                <div class="cap-p">
                    <div class="link">
                        <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                    </div>
                    <div class="new">
                        <img src="{{ asset('img/new-1.png') }}" alt="">
                    </div>
                </div>
                <div class="cap-p">
                    <div class="link">
                        <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                    </div>
                    <div class="new">
                        <span>
                            1h atrás
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-title">
            <div class="title">
                <h2>Não sei o que</h2>
            </div>
            <div class="order-by">
                <ul>
                    <li><a href="">robson</a></li>
                    <li><a href="">robson</a></li>
                    <li><a href="">robson</a></li>
                    <li><a href="">robson</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar">

    </div>


    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
</body>

</html>
