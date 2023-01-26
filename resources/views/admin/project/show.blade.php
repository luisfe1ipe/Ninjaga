@extends('components.app')
@section('title', $project->title)

@section('navbar')
    <x-navbar view="" />
@endsection

@section('item-view')

    <section class="s-hero">
        <div class="bg-image bg-[url('{{ asset("projects/$title/banner/$project->banner") }}')]"></div>
        <div class="container">
            <div class="container-content">
                <div class="image">
                    <img src="{{ asset("projects/$title/banner/$project->banner") }}" alt="">
                </div>
                <div class="content">
                    <div class="header-content">
                        <button id="dropdownRightButton" data-dropdown-toggle="dropdownRight" data-dropdown-placement="right"
                            class="config" type="button">
                            <i class="material-icons text-3xl">settings</i>
                        </button>
                        <div class="title">
                            <h1>{{ $project->title }}</h1>
                            <p>{{ $project->author->name }}</p>
                        </div>
                    </div>
                    <div class="body-content">
                        <div class="synopsis">
                            {{ $project->synopsis }}
                        </div>
                        <div class="categories">
                            @foreach ($genres as $genre)
                                <a href="">
                                    <button
                                        class="bg-[#A93F3F] hover:bg-[#7C2F2F] text-white font-bold py-2 px-4 rounded shadow-md">{{ $genre->name }}</button>
                                </a>
                            @endforeach

                        </div>

                        <div class="info">
                            <div class="info-text">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    bar_chart
                                </i>
                                <p>453.789 Visualizações</p>
                            </div>
                            <div class="info-text">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    menu_book
                                </i>
                                <p>29 Capitulos</p>
                            </div>
                            <div class="info-text">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    favorite
                                </i>
                                <p>{{ $project->favorite()->count() }} Favoritos</p>
                            </div>
                            <div class="info-text">
                                <i class="material-symbols-outlined text-[#A93F3F]">
                                    info
                                </i>
                                <span href="" type="button" data-modal-toggle="more-info">Mais informações</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="s-chapters">

        <div class="header">
            <div class="title">
                <i class="material-symbols-outlined">
                    view_list
                </i>
                <h1>Capítulos</h1>
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
                <a href="">
                    Ler o primeiro
                </a>
                <a href="" style="width: 105px;">
                    Ler o ultimo
                </a>
            </div>
        </div>
        <div class="container-chapters">
            @foreach ($project->chapters->sortByDesc('created_at') as $chapters)
                <span class="hidden">{{ $titleChapterFormated = str_replace(' ', '-', $chapters->title) }}</span>
                <div class="card-chapter">
                    <div class="img">
                        <img src="{{ asset("projects/$title/chapters/$titleChapterFormated/image-chapter/$chapters->image_chapter") }}"
                            alt="">
                    </div>
                    <a href="{{ route('chapter.show', ['id' => $project->id, 'chapter_id' => $chapters->id]) }}"
                        onclick="check()" class="content">
                        <div class="content">
                            <p>{{ $chapters->title }}</p>
                            <span>
                                {{ date('d/m/y', strtotime($chapters->created_at)) === date('d/m/y') ? 'Hoje' : date('d/m/Y', strtotime($chapters->created_at)) }}
                            </span>
                        </div>
                    </a>

                    <div class="delete">
                        <form
                            action="{{ route('chapter.destroy', ['id' => $project->id, 'chapter_id' => $chapters->id]) }}"
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
    <div id="dropdownRight"
        class="hidden z-10 h-auto w-40 bg-[#121212] rounded divide-y divide-gray-100 shadow dropdown-container">
        <ul class="py-1 text-gray-700  dropdown-menu" aria-labelledby="dropdownRightButton">
            <li class="">
                <form action="{{ route('save.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="save" value="favorite">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div
                        class=" px-4 py-2 text-sm hover:bg-[#000000] hover:text-red-500 text-white gap-1.5
                        @if ($fav == true) text-red-500 @endif
                    ">
                        <button type="submit" class="flex items-center gap-1.5">
                            <i class="material-icons text-lg">
                                favorite
                            </i>
                            Favoritos
                        </button>
                    </div>
                </form>
            </li>
            <li>
                <form action="{{ route('save.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="save" value="completed">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div
                        class=" px-4 py-2 text-sm hover:bg-[#000000] hover:text-green-500 text-white flex items-center gap-1.5
                        @if ($completed == true) text-green-500 @endif
                    ">
                        <button type="submit" class="flex items-center gap-1.5">
                            <i class="material-icons text-lg">
                                check
                            </i>
                            Lido
                        </button>
                    </div>
                </form>
            </li>
            <li route="" icon="bookmark" class="hover:text-yellow-500">
                <form action="{{ route('save.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="save" value="read">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div
                        class=" px-4 py-2 text-sm hover:bg-[#000000] hover:text-orange-500 text-white flex items-center gap-1.5
                        @if ($read == true) text-orange-500 @endif
                    ">
                        <button type="submit" class="flex items-center gap-1.5">
                            <i class="material-icons text-lg">
                                bookmark
                            </i>
                            Lerei
                        </button>
                    </div>
                </form>
            </li>
            <li route="" icon="block" class="hover:text-gray-500">
                <form action="{{ route('save.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="save" value="stop">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div
                        class=" px-4 py-2 text-sm hover:bg-[#000000] hover:text-slate-500 text-white flex items-center gap-1.5
                    @if ($stop == true) text-slate-500 @endif
                ">
                        <button type="submit" class="flex items-center gap-1.5">
                            <i class="material-icons text-lg">
                                lock
                            </i>
                            Parei
                        </button>
                    </div>
                </form>
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
