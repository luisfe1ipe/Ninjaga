@props(['view' => null,])
<nav>
    <div class="nav-container">
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
                        class="z-10 border-2 border-[#121212] hidden font-normal bg-[#000000] divide-y divide-gray-100 rounded-lg  w-32">
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
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="search-profile">
            <div class="search">
                <x-input.search />
            </div>
            <div class="profile">
                <p>Olá, {{ Auth::user()->user }}</p>
                <img id="avatarButton" type="button" src="{{ asset('img/default.png') }}" alt="User dropdown"
                    data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
                    class="w-10 h-10 rounded-full cursor-pointer">

                <!-- Dropdown menu -->
                <div id="userDropdown" class="z-10 hidden divide-y divide-gray-600 rounded shadow w-44 bg-[#28282E]">
                    <div class="py-1 text-[#F2F2F2]">
                        <a href="#"
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
                        <a href="#"
                            class="flex items-center gap-1.5 block px-4 py-2 text-base hover:bg-[#000000] text-white"><i
                                class="material-icons text-lg">exit_to_app </i> Logout</a>

                    </div>
                </div>
                {{-- <div class="bg-red-700 rounded-full h-12 w-12">

                </div> --}}
            </div>
        </div>
    </div>
</nav>
