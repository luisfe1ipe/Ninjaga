@extends('components.app')
@section('title', 'Cadastrar obra')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <section class="s-create">
        <div class="container-p">
            <h1>Cadastrar Obra</h1>
            <x-form action="{{ route('project.create') }}">
                <div class="form">
                    <x-preview.banner name="banner" image="" />
                    <div class="right">
                        <div class="titleProject relative">
                            <label for="title" class="error">Titulo</label>
                            <input type="text" name="title" value="{{old('title')}}" id="title" placeholder="Digite aqui..."
                                class="input focus:ring-[#C4C4CC] @if ($errors->has('title')) error-input @endif">
                            @if ($errors->has('title'))
                                <span class="message-error">
                                    @foreach ($errors->get('title') as $error)
                                        {{ $error }}
                                    @endforeach
                                </span>
                            @endif
                            <input type="hidden" name="formated_title">
                        </div>
                        <div class="synopsis relative">
                            <label for="synopsis">Sinopse</label>
                            <textarea name="synopsis" id="synopsis" placeholder="Digite aqui..." 
                                class="focus:ring-[#C4C4CC]
                            @if ($errors->has('synopsis')) error-input @endif">{{old('synopsis')}}</textarea>
                            @if ($errors->has('synopsis'))
                                <span class="message-error">
                                    @foreach ($errors->get('synopsis') as $error)
                                        {{ $error }}
                                    @endforeach
                                </span>
                            @endif
                        </div>
                        <div class="selects">
                            <div class="select relative">
                                <label for="type" class="">Tipo</label>
                                <select id="type" name="type"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC] @if ($errors->has('type')) error-input @endif">
                                    <option value="" disable selected hidden></option>
                                    <option value="Manga">Manga</option>
                                    <option value="Manwha">Manwha</option>
                                    <option value="Novel">Novel</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="message-error">
                                        @foreach ($errors->get('type') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <div class="select relative">
                                <label for="status" class="">Status</label>
                                <select id="status" name="status"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC] @if ($errors->has('status')) error-input @endif">
                                    <option value="" disable selected hidden></option>
                                    <option value="Lançamento">Lançamento</option>
                                    <option value="Completo">Completo</option>
                                    <option value="Hiato">Hiato</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="message-error">
                                        @foreach ($errors->get('status') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                            <div class="select relative">
                                <label for="genres" class="">
                                    Gêneros
                                </label>
                                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                                    class="inline-flex justify-end items-center px-4 py-2 text-sm font-medium text-center text-[#C4C4CC] rounded-lg focus:ring-1 focus:outline-none focus:ring-[#C4C4CC] @if ($errors->has('genres')) error-input @endif"
                                    type="button">
                                    <svg style="color:#68707D !important;" class="w-4 h-4 ml-2" aria-hidden="true"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                    <div id="dropdownSearch"
                                        class="z-50 hidden divide-y divide-gray-600 rounded shadow w-48 bg-[#28282E]">
                                        <ul class="teste h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownSearchButton">
                                            @foreach ($genres as $genre)
                                                <li class="">
                                                    <div class="flex items-center mt-2 p-2 rounded hover:bg-[#000000] ">
                                                        <input id="checkbox={{ $genre->id }}" type="checkbox"
                                                            name="genres[]" value="{{ $genre->id }}" onclick="robson()"
                                                            class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox={{ $genre->id }}"
                                                            class="cursor-pointer ml-2 text-sm font-medium">{{ $genre->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a href="#" data-modal-target="genre-modal" data-modal-toggle="genre-modal"
                                            class="flex items-center p-3 text-sm font-medium border-t border-gray-200 rounded-b-lg bg-[#28282E] gap-1 hover:text-[#A93F3F]">
                                            <i class="material-symbols-outlined">
                                                add
                                            </i>
                                            Novo genêro
                                        </a>
                                    </div>

                                </button>
                                @if ($errors->has('genres'))
                                    <span class="message-error">
                                        @foreach ($errors->get('genres') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif

                            </div>
                            <div class="select relative">
                                <label for="released" class="">Lançado em</label>
                                <input type="number" name="released" value="{{old('released')}}" id="released" placeholder="Digite aqui..."
                                    class="input focus:ring-[#C4C4CC] @if ($errors->has('released')) error-input @endif">
                                @if ($errors->has('released'))
                                    <span class="message-error">
                                        @foreach ($errors->get('released') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="author-studio">
                            <div class="author relative">
                                <div>
                                    <label for="author" class="">Autor</label>
                                    <select id="author" name="author_id"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC] @if ($errors->has('author_id')) error-input @endif">
                                        <option value="" disable selected hidden></option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 @if ($errors->has('author_id'))
                                    <span class="message-error">
                                        @foreach ($errors->get('author_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif
                                <button data-modal-target="author-modal" data-modal-toggle="author-modal" class=""
                                    type="button">
                                    <img src="/img/svg/plus.svg" alt="">
                                </button>
                            </div>
                            <div class="studio relative">
                                <div>
                                    <label for="studio" class="">Estudio</label>
                                    <select id="studio" name="studio_id"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC] @if ($errors->has('studio_id')) error-input @endif">
                                        <option value="" disable selected hidden></option>
                                        @foreach ($studios as $studio)
                                            <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 @if ($errors->has('studio_id'))
                                    <span class="message-error">
                                        @foreach ($errors->get('studio_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </span>
                                @endif
                                <div class="more">
                                    <button data-modal-target="studio-modal" data-modal-toggle="studio-modal"
                                        class="" type="button">
                                        <img src="/img/svg/plus.svg" alt="">
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-imgs">
                    <h1>Fotos para perfil de usuários</h1>
                    <div class="images">
                        <x-preview.perfil-user name="image_1" id="usr_img_1" title="1° Foto" />
                        <x-preview.perfil-user name="image_2" id="usr_img_2" title="2° Foto" />
                        <x-preview.perfil-user name="image_3" id="usr_img_3" title="3° Foto" />
                    </div>

                </div>

                <div class="btns">
                    <button type="reset" class="btn-s">Cancelar</button>
                    <button type="submit" class="btn-p">Confirmar</button>
                </div>
            </x-form>
        </div>
    </section>

    <section class="s-unavailable">
        <img src="{{ asset('img/page-unavailable.png') }}" alt="">
        <p>Página dísponivel apenas para computadores.</p>
        <a href="{{ url()->previous() }}" class="btn-p mt-6">Voltar</a>
    </section>
    <x-modal.default id="author-modal" title="Adicionar Ator">
        <x-form action="{{ route('author.store') }}">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="input focus:ring-[#C4C4CC] mb-5">
            <div class="flex  space-x-6">
                <button data-modal-hide="author-modal" type="reset" class="btn-s">Cancelar</button>
                <button data-modal-hide="author-modal" type="submit" class="btn-p">Cadastrar</button>
            </div>
        </x-form>

    </x-modal.default>

    <x-modal.default id="studio-modal" title="Adicionar Estúdio">
        <x-form action="{{ route('author.store') }}">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="input focus:ring-[#C4C4CC] mb-5">
            <div class="flex  space-x-6">
                <button data-modal-hide="studio-modal" type="button" class="btn-s">Cancelar</button>
                <button data-modal-hide="studio-modal" type="submit" class="btn-p">Cadastrar</button>
            </div>
        </x-form>
    </x-modal.default>

    <x-modal.default id="genre-modal" title="Adicionar Genêro">
        <x-form action="">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="input focus:ring-[#C4C4CC] mb-5">
            <div class="flex  space-x-6">
                <button data-modal-hide="genre-modal" type="button" class="btn-s">Cancelar</button>
                <button data-modal-hide="genre-modal" type="submit" class="btn-p">Cadastrar</button>
            </div>
        </x-form>
    </x-modal.default>

    <!-- Dropdown menu -->

@endsection
