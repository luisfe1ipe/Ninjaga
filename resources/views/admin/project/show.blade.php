@extends('components.app')
@section('title', $project->title)

@section('navbar')
    <x-navbar view="" />
@endsection

@section('item-view')

    <section class="s-hero">
        <div class="bg-image bg-[url('{{ asset("projects/$project->formated_title/banner/$project->banner") }}')]"></div>
        <div class="container-p">
            <div class="container-content">
                <div class="image">
                    <img src="{{ asset("projects/$project->formated_title/banner/$project->banner") }}" alt="">
                </div>
                <div class="content">
                    <div class="header-content">
                        <button id="dropdownRightButton" @auth data-dropdown-toggle="dropdownRight" @endauth
                            @guest data-modal-toggle="not-auth" @endguest data-dropdown-placement="right" class="config"
                            type="button">
                            <i class="material-icons text-3xl">settings</i>
                        </button>
                        <div class="titleProject">
                            <h1>{{ $project->title }}</h1>
                            <p>{{ $project->author->name }}</p>
                        </div>
                    </div>
                    <div class="body-content">
                        <div class="synopsis">
                            <span class="hidden">Sinopse</span>{{ $project->synopsis }}
                        </div>
                        <div class="categories">
                            @foreach ($project->genres as $genre)
                                <a href="{{ route('project.indexByGenre', ['genre' => $genre->id]) }}">
                                    <button
                                        class="bg-[#A93F3F] hover:bg-[#7C2F2F] text-white font-bold py-2 px-4 rounded shadow-md">{{ $genre->name }}</button>
                                </a>
                            @endforeach

                        </div>

                        <div class="info">
                            <div class="info-text chapters-count">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    menu_book
                                </i>
                                <p>{{ $project->chapters->count() }} Capítulos</p>
                            </div>
                            <div class="info-text" id="fav">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    favorite
                                </i>
                                <p>{{ $project->favorite()->count() }} Favoritos</p>
                            </div>
                            <div class="info-text more-info">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    info
                                </i>
                                <span href="" type="button" data-modal-toggle="more-info">Mais informações</span>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="s-chapters hidden">
                    <div class="header">
                        <div class="title">
                            <i class="material-symbols-outlined">
                                view_list
                            </i>
                            <h1>Capítulos - {{ $project->chapters->count() }}</h1>
                        </div>
                        <div class="search">
                            <a href="{{ route('chapter.create', ['id' => $project->id]) }}"
                                data-tooltip-target="create-chapter">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                                <div id="create-chapter" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#28282e] rounded-lg shadow-sm opacity-0 tooltip">
                                    Adicionar capítulo
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </a>
                            <x-input.search />
                        </div>
                    </div>

                    <div class="container-btns">
                        <div class="btns">
                            @if (count($project->chapters) > 0)
                                <a
                                    href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $project->chapters->first()->id]) }}">
                                    Ler o primeiro
                                </a>
                                <a href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $project->chapters->last()->id]) }}"
                                    style="width: 105px;">
                                    Ler o ultimo
                                </a>
                            @endif

                        </div>
                    </div>
                    <div class="container-chapters">
                        @foreach ($project->chapters->sortByDesc('created_at') as $chapter)
                            <div class="card-chapter">
                                <div class="img">
                                    <img src="{{ asset("projects/$project->formated_title/chapters/$chapter->formated_title/image-chapter/$chapter->image_chapter") }}"
                                        alt="">
                                </div>
                                <a href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $chapter->id]) }}"
                                    onclick="check()" class="content">
                                    <div class="content">
                                        <p>{{ $chapter->title }}</p>
                                        <span>
                                            {{ date('d/m/y', strtotime($chapter->created_at)) === date('d/m/y') ? 'Hoje' : date('d/m/Y', strtotime($chapter->created_at)) }}
                                        </span>
                                    </div>
                                </a>

                                <div class="delete">
                                    <form
                                        action="{{ route('chapter.destroy', ['id' => $project->id, 'chapter_id' => $chapter->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <i class="material-symbols-outlined">
                                                delete
                                            </i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="s-chapters">
        <div class="header">
            <div class="title">
                <i class="material-symbols-outlined">
                    view_list
                </i>
                <h1>Capítulos - {{ $project->chapters->count() }}</h1>
            </div>
            <div class="search">
                <a href="{{ route('chapter.create', ['id' => $project->id]) }}" data-tooltip-target="create-chapter">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    <div id="create-chapter" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#28282e] rounded-lg shadow-sm opacity-0 tooltip">
                        Adicionar capítulo
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </a>
                <x-input.search />
            </div>
        </div>

        <div class="container-btns">
            <div class="btns">
                @if (count($project->chapters) > 0)
                    <a
                        href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $project->chapters->first()->id]) }}">
                        Ler o primeiro
                    </a>
                    <a href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $project->chapters->last()->id]) }}"
                        style="width: 105px;">
                        Ler o ultimo
                    </a>
                @endif

            </div>
        </div>
        <div class="container-chapters">
            @foreach ($project->chapters->sortByDesc('created_at') as $chapter)
                <div class="card-chapter">
                    <div class="img">
                        <img src="{{ asset("projects/$project->formated_title/chapters/$chapter->formated_title/image-chapter/$chapter->image_chapter") }}"
                            alt="">
                    </div>
                    <a href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $chapter->id]) }}"
                        onclick="check()" class="content">
                        <div class="content">
                            <p>{{ $chapter->title }}</p>
                            <span>
                                {{ date('d/m/y', strtotime($chapter->created_at)) === date('d/m/y') ? 'Hoje' : date('d/m/Y', strtotime($chapter->created_at)) }}
                            </span>
                        </div>
                    </a>

                    <div class="delete">
                        <form action="{{ route('chapter.destroy', ['id' => $project->id, 'chapter_id' => $chapter->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i class="material-symbols-outlined">
                                    delete
                                </i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>



    <!-- Dropdown menu -->
    @auth
        <div id="dropdownRight"
            class="hidden z-10 h-auto w-40 bg-[#121212] rounded divide-y divide-gray-100 shadow dropdown-container">
            <ul class="py-1 text-gray-700  dropdown-menu" aria-labelledby="dropdownRightButton">
                <li class="">
                    <livewire:project.save.favorite :projectId="$project->id"/>
                </li>
                <li>
                    <livewire:project.save.completed :projectId="$project->id"/>
                </li>
                <li>
                    <livewire:project.save.read :projectId="$project->id"/>
                </li>
                <li>
                    <livewire:project.save.stop :projectId="$project->id"/>
                </li>

                <div class="adminConfig text-sm">
                    <x-dropdown.li route="{{ route('project.update', ['id' => $project->id]) }}" gIcon="edit"
                        class="">
                        Editar
                    </x-dropdown.li>

                    <x-dropdown.li route="" gIcon="delete" class="">
                        <form action="{{ route('project.destroy', ['id' => $project->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>
                    </x-dropdown.li>

                </div>
            </ul>

        </div>
    @endauth

    @guest
        <x-modal.default id="not-auth" title="Ação indisponível">
            <div class="flex flex-col items-center">
                <img class="w-[150px]" src="{{ asset('img/http-503.svg') }}" alt="">
                <p class="mt-2">Para realizar está ação você deve estar logado.</p>
                <a href="{{ route('user.login') }}"
                    class="mt-6 btn-p flex items-center justify-center w-[85px] h-[35px]">Entrar</a>
            </div>
        </x-modal.default>
    @endguest

    <x-modal.default id="more-info" title="Mais informações">
        <div class="modal-body">
            <div class="items">
                <p>Estúdio</p>
                <p>Tipo</p>
                <p>Lançado em</p>
                <p>Status</p>
            </div>

            <div class="items-description">
                <a href="">{{ $project->studio->name }}</a>
                <a href="">{{ $project->type }}</a>
                <a href="">{{ $project->released }}</a>
                <a href="">{{ $project->status }}</a>
            </div>
        </div>
    </x-modal.default>

@endsection

<style>
    footer {
        display: none
    }
</style>
