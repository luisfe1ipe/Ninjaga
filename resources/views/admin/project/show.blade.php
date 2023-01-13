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
                        <div class="config">
                            <button id="dropdownRightButton" data-dropdown-toggle="dropdownRight"
                                data-dropdown-placement="right" class="" type="button">
                                <i class="material-icons text-3xl">settings</i>
                            </button>
                        </div>
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
                                <p>1.6k favoritos</p>
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

    <!-- Dropdown menu -->
    <div id="dropdownRight"
        class="hidden z-10 h-auto w-96 bg-[#121212] rounded divide-y divide-gray-100 shadow dropdown-container">
        <ul class="py-1 text-gray-700  dropdown-menu" aria-labelledby="dropdownRightButton">
            <x-dropdown.li route="" icon="favorite" class="hover:text-red-500">Favoritos</x-dropdown.li>
            <x-dropdown.li route="" icon="check" class="hover:text-green-500">Lidos</x-dropdown.li>
            <x-dropdown.li route="" icon="bookmark" class="hover:text-yellow-500">Lerei</x-dropdown.li>
            <x-dropdown.li route="" icon="block" class="hover:text-gray-500">Parei</x-dropdown.li>
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
