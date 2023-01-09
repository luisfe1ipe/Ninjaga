@props(['view' => null])
<nav>
    <div class="nav-container">
        <div class="logo">
            <a href="">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>

        <div class="nav">
            <ul>
                <li> <a href="" class="@if($view == 'inicio') active @endif">início</a> </li>
                <li> <a href="" class="@if($view == 'manwha') active @endif">manwha</a> </li>
                <li> <a href="" class="@if($view == 'novel') active @endif">novel</a> </li>
                <li> <a href="" class="@if($view == 'concluidos') active @endif">concluídos</a> </li>
            </ul>
        </div>

        <div class="search-profile">
            <div class="search">
                <x-input.search/>
            </div>
            <div class="profile">
                <p>Olá, luisfe1ipe</p>
                <x-dropdown.profile>
                    <x-dropdown.li route="" icon="favorite" class="hover:text-red-500" >Favoritos</x-dropdown.li>
                    <x-dropdown.li route="" icon="check" class="hover:text-green-500">Lidos</x-dropdown.li>
                    <x-dropdown.li route="" icon="bookmark" class="hover:text-yellow-500">Lerei</x-dropdown.li>
                    <x-dropdown.li route="" icon="block" class="hover:text-gray-500">Parei</x-dropdown.li>
                </x-dropdown.profile>
                {{-- <div class="bg-red-700 rounded-full h-12 w-12">

                </div> --}}
            </div>
        </div>
    </div>
</nav>