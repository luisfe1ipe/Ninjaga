@props(['view' => null])
<nav>
    <div class="nav-container">
        <div class="flex items-center gap-8 logo-nav">
            <div class="logo">
                <a href="{{ route('project.index') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>
            </div>

            <div class="nav">
                <ul class="nav-ul">
                    <li> <a href="{{ route('project.index') }}"
                            class="@if ($view == 'inicio') active @endif">Início</a> </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="@if ($view == 'obras') active @endif flex items-center justify-between font-bold rounded hover:text-[#A93F3F]">Obras
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 border-2 border-[#121212] hidden font-normal bg-[#000000] divide-y divide-gray-100 rounded-lg  ">
                            <ul class="pt-2 flex-col text-center" aria-labelledby="dropdownLargeButton">
                                <li class="w-full pb-2">
                                    <a href="{{ route('project.index', ['type' => 'manga']) }}"
                                        class="block px-4 py-2">Manga</a>
                                </li>
                                <li class="w-full pb-2">
                                    <a href="{{ route('project.index', ['type' => 'manwha']) }}"
                                        class="block px-4 py-2">Manwha</a>
                                </li>
                                <li class="w-full pb-2">
                                    <a href="{{ route('project.index', ['type' => 'novel']) }}"
                                        class="block px-4 py-2">Novel</a>
                                </li>
                                <li class="w-full pb-2" style="border-top: 1px solid rgb(107 114 128)">
                                    <a href="{{ route('project.create') }}" class="block px-4 py-2">Adicionar obra</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="search-profile">
            <div class="search">
                <livewire:search />
            </div>
            @auth
                <div class="profile">
                    <p>Olá, {{ Auth::user()->user }}</p>
                    <img id="avatarButton" type="button" src="{{ asset('img/default.png') }}" alt="User dropdown"
                        data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
                        class="w-10 h-10 rounded-full cursor-pointer">

                    <!-- Dropdown menu -->
                    <div id="userDropdown" class="z-10 hidden divide-y divide-gray-600 rounded shadow w-44 bg-[#28282E]">
                        <div class="py-1 text-[#F2F2F2]">
                            <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}"
                                class="flex items-center gap-1.5 block px-4 py-2 text-base hover:bg-[#000000] text-white"><i
                                    class="material-icons text-lg">person</i> Perfil</a>
                        </div>
                        <ul class="py-1 cursor-pointer" aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('save.index', ['type' => 'favorites']) }}" value
                                    class="block hover:text-red-500 px-4 py-2 text-sm hover:bg-[#000000] text-white flex items-center gap-1.5">
                                    <i class="material-symbols-outlined text-lg">
                                        favorite
                                    </i>
                                    Favoritos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'completeds']) }}" value
                                    class="block hover:text-green-500 px-4 py-2 text-sm hover:bg-[#000000] text-white flex items-center gap-1.5">
                                    <i class="material-symbols-outlined text-lg">
                                        check
                                    </i>
                                    Lidos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'reads']) }}" value
                                    class="block hover:text-orange-500 px-4 py-2 text-sm hover:bg-[#000000] text-white flex items-center gap-1.5">
                                    <i class="material-symbols-outlined text-lg">
                                        bookmark
                                    </i>
                                    Lerei
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'stops']) }}" value
                                    class="block hover:text-slate-500 px-4 py-2 text-sm hover:bg-[#000000] text-white flex items-center gap-1.5">
                                    <i class="material-symbols-outlined text-lg">
                                        lock
                                    </i>
                                    Parei
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('user.logout') }}"
                                class="flex items-center gap-1.5 block px-4 py-2 text-base hover:bg-[#000000] text-white"><i
                                    class="material-icons text-lg">exit_to_app </i> Logout</a>

                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="login-register flex items-center gap-6">
                    <a href="{{ route('user.register') }}" class="btn-s flex items-center justify-center w-[85px] h-[35px]">Cadastrar</a>
                    <a href="{{ route('user.login') }}" class="btn-p flex items-center justify-center w-[85px] h-[35px]">Entrar</a>
                </div>
            @endguest
        </div>

        <div class="mobile-menu">
            <button class="" type="button" data-drawer-target="drawer-navigation"
                data-drawer-show="drawer-navigation" aria-controls="drawer-navigation" onclick="drawer()">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </button>

            <div id="drawer-navigation" class="hidden fixed z-40 h-screen p-6 overflow-y-auto bg-[#000000] w-60"
                tabindex="-1" aria-labelledby="drawer-navigation-label">
                <div class="p-4">
                    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Fechar</span>
                    </button>
                </div>
                <div class="sidebar-content">
                    <div class="logo-mobile">
                        @guest
                            <img src="{{ asset('img/logo-col.png') }}" alt="">
                        @endguest
                        @auth
                            <img src="{{ asset('img/default.png') }}" alt="" class="photoProfile">
                            <p>{{ Auth::user()->user }}</p>
                        @endauth
                    </div>

                    <div class="nav-mobile">
                        <ul class="nav-ul">
                            @auth
                                <li>
                                    <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}">Perfil</a>
                                </li>
                            @endauth
                            <li> <a href="{{ route('project.index') }}"
                                    class="@if ($view == 'inicio') active @endif">Início</a> </li>
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownMobile"
                                    class="@if ($view == 'obras') active @endif flex items-center gap-1.5 font-bold rounded hover:text-[#A93F3F]">Obras
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownMobile"
                                    class="z-10 border-2 border-[#121212] hidden font-normal bg-[#000000] divide-y divide-gray-100 rounded-lg  ">
                                    <ul class="pt-2 flex-col text-center" aria-labelledby="dropdownLargeButton">
                                        <li class="w-full pb-2">
                                            <a href="{{ route('project.index', ['type' => 'manga']) }}"
                                                class="block px-4 py-2">Manga</a>
                                        </li>
                                        <li class="w-full pb-2">
                                            <a href="{{ route('project.index', ['type' => 'manwha']) }}"
                                                class="block px-4 py-2">Manwha</a>
                                        </li>
                                        <li class="w-full pb-2">
                                            <a href="{{ route('project.index', ['type' => 'novel']) }}"
                                                class="block px-4 py-2">Novel</a>
                                        </li>
                                        <li class="w-full pb-2" style="border-top: 1px solid rgb(107 114 128)">
                                            <a href="{{ route('project.create') }}" class="block px-4 py-2">Adicionar
                                                obra</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    @guest
                        <div class="login-register flex flex-col items-center gap-2 mt-10">
                            <a href="{{ route('user.register') }}" class="btn-s w-full text-center">Cadastrar</a>
                            <a href="{{ route('user.login') }}" class="btn-p w-full text-center">Entrar</a>
                        </div>
                    @endguest

                    @auth
                        <a href="{{ route('user.logout') }}" class="mt-10 btn-p w-full text-center" style="display: block !important;">Logout</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

</nav>


