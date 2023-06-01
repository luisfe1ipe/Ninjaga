<div>
    <div class="relative h-auto overflow-hidden">
        <div
            class="h-full w-full absolute blur-[2px] brightness-[12%] -z-0 inset-0 bg-cover bg-center"
            style="background-image: url({{$project->banner}})">
        </div>
        <div class="py-8  relative">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-100 dark:text-white">
                    <div class="flex justify-between gap-8">
                        <div>
                            <img class="w-64 h-auto rounded-md" src="{{ $project->banner }}"
                                 alt="">
                        </div>
                        <div class="w-full flex flex-col justify-between">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-start gap-6">
                                    <x-dropdown align="left"
                                                customClasses="bg-white border dark:border-[#121212] dark:bg-[#0B0B0B]">
                                        <x-slot name="trigger">
                                            <button
                                                class="w-10 h-10 bg-red-500 hover:bg-red-600 transition ease-in flex justify-center items-center rounded-full">
                                                <span class="material-symbols-outlined">
                                                    settings
                                                </span>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-gray-300 w-5">
                                                        favorite
                                                    </span>
                                                    Favoritos
                                                </div>
                                            </x-dropdown-link>
                                            <x-dropdown-link>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-gray-300 w-5">
                                                        bookmark
                                                    </span>
                                                    Lerei
                                                </div>
                                            </x-dropdown-link>
                                            <x-dropdown-link>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-gray-300 w-5">
                                                        check
                                                    </span>
                                                    Lido
                                                </div>
                                            </x-dropdown-link>
                                            <x-dropdown-link>
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-gray-300 w-5">
                                                        lock
                                                    </span>
                                                    Parei
                                                </div>
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                    <div>
                                        <h1 class="text-2xl  font-bold ">{{ $project->title }}</h1>
                                        <p class="text-gray-300 text-sm">{{ $project->author->name }}</p>
                                    </div>
                                </div>
                                <div class="max-h-32 overflow-y-scroll">
                                    <p class="text-gray-200 dark:text-white text-sm mr-1">
                                        {!!$project->synopsis !!}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center gap-3">
                                    @foreach ($project->genres as $genre)
                                        <a href=""
                                           class="px-2 text-xs py-0.5 rounded bg-red-500 text-white hover:bg-red-600 transition ease-in">
                                            {{ $genre->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="flex items-center gap-6">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-2xl text-red-500">
                                            favorite
                                        </span>
                                        <p>
                                            Favoritos
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-2xl text-red-500">
                                            menu_book
                                        </span>
                                        <p>
                                            Capítulos
                                        </p>
                                    </div>
                                    <div>

                                        <button type="button" x-data=''
                                                x-on:click.prevent="$dispatch('open-modal', 'modal_more_informations')"
                                                class="flex items-center gap-1 cursor-pointer">
                                            <span class="material-symbols-outlined text-2xl text-red-500">
                                                info
                                            </span>
                                            <p class="hover:underline decoration-red-500">
                                                Mais informações
                                            </p>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="py-8  relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-100 bg-white rounded-md dark:bg-transparent dark:text-white">
                <div class="flex items-center justify-between">
                    <x-my.title icon='view_list' sizeIcon='text-3xl' colorIcon='text-red-500' text='Capítulos'/>
                    <div class="w-1/4">
                        <label for="search"
                               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pesquisar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="search"
                                   class="block w-full px-4 py-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-[#222222] dark:border-[#222222] dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                   placeholder="Digite aqui..." required>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center mt-10">
                    <div class="flex items-center justify-between w-1/3">
                        <x-primary-button>
                            Ler o primeiro
                        </x-primary-button>
                        <x-primary-button>
                            Ler o último
                        </x-primary-button>

                    </div>
                </div>
                <div class="w-full flex justify-center mt-8">
                    <div class="w-3/4 h-[350px] overflow-x-scroll grid grid-cols-3 gap-6 p-2">
                        @foreach($chapters as $chapter)
                            <div wire:click="viewChapter({{$chapter->id}})}}"
                                 class="group h-16 bg-white hover:bg-gray-100 border border-gray-200 dark:border-none dark:bg-[#222222] dark:hover:bg-[#0B0B0B] rounded-md w-full flex flex-col gap-1 p-2 text-center transition ease-in cursor-pointer">
                                <p class="text-gray-700 dark:text-white group-hover:text-red-500 text-md font-bold">
                                    Capítulo {{$chapter->number}}</p>
                                <span class="text-sm text-gray-500">
                                <?php
                                        if (date('M') == \Carbon\Carbon::parse($chapter->created_at)->format('M')) {
                                            echo \Carbon\Carbon::parse($chapter->created_at)->diffForHumans();
                                        } else {
                                            echo \Carbon\Carbon::parse($chapter->created_at)->isoFormat('d MMMM, Y');
                                        }
                                        ?>
                            </span>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="mt-20">
                    <x-my.title icon="chat_bubble" colorIcon="text-red-500" sizeIcon="text-3xl" text="Comentários - ?"/>
                </div>
            </div>
        </div>
        <div class="z-20 relative">
            <x-modal name='modal_more_informations'>
                <div class="relative p-6 text-gray-800 dark:text-white">
                    <div
                        class="absolute rounded-md cursor-pointer right-2 top-2 hover:bg-gray-100 dark:hover:bg-[#222222]"
                        x-on:click="$dispatch('close')">
                    <span
                        class="material-symbols-outlined text-gray-400 dark:text-gray-300 text-xl">
                        close
                    </span>
                    </div>
                    <div class="text-center mb-7">
                        <h1 class="font-bold text-lg">{{ $project->title }}</h1>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-1">
                            <div class="flex items-center gap-1">
                                                            <span
                                                                class="material-symbols-outlined text-red-500 text-xl">
                                                                person
                                                            </span>
                                <p class="font-bold text-base">Autor:</p>
                            </div>
                            <span>{{ $project->author->name }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-red-500 text-xl">
                                home
                            </span>
                                <p class="font-bold text-base">Estúdio:</p>
                            </div>
                            <span>{{ $project->studio->name }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-red-500 text-xl">
                                sell
                            </span>
                                <p class="font-bold text-base">Tipo:</p>
                            </div>
                            <span>{{ $project->type->name }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-red-500 text-xl">
                                show_chart
                            </span>
                                <p class="font-bold text-base">Status:</p>
                            </div>
                            <span>{{ $project->status->name }}</span>
                        </div>
                        <hr class="dark:border-[#222222]">
                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-red-500 text-xl">
                                favorite
                            </span>
                                <span> - Favoritos</span>
                            </div>
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-green-500 text-xl">
                                check
                            </span>
                                <span> - Lidos</span>
                            </div>
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-orange-500 text-xl">
                                bookmark
                            </span>
                                <span> - Lerei</span>
                            </div>
                            <div class="flex items-center gap-1">
                            <span
                                class="material-symbols-outlined text-gray-500 text-xl">
                                lock
                            </span>
                                <span> - Parei</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal more infomations--}}
            </x-modal>
        </div>
        {{--End - Modal more informations--}}
    </div>

</div>
