@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <select name="categorias[]" class="select2 form-control"" id="idSelect2" multiple="" tabindex="-1" style="display: none;">
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}"
                @foreach ($project->genres as $g)
                        {{ $g->pivot->id === $genre->id ? 'selected' : '' }} @endforeach>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>


    <section class="s-create">
        <div class="container-p">
            <div class="header">
                <h1>Editar - {{ $project->title }}</h1>
                <form action="{{ route('project.destroy', ['id' => $project->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-[#A93F3F] hover:bg-[#7C2F2F] text-white py-2 px-4 rounded flex items-center gap-1.5">
                        <span class="material-symbols-outlined">delete</span>
                        Deletar
                    </button>
                </form>
            </div>
            <x-form action="{{ route('project.edit', ['id' => $project->id]) }}" method="PUT">
                <div class="form">
                    <input type="hidden" name="oldTitle" value="{{ $project->title }}">
                    <div class="image-container">
                        <label for="banner">
                            Escolha uma imagem
                            <div class="content">
                                <div class="icon text-[#f2f2f2]" id="icon">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 " fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p>Clique para fazer upload</p>
                                </div>
                                <img id="photo" src="{{ asset("projects/$title/banner/$project->banner") }}"
                                    alt="">
                            </div>
                        </label>
                        <input type="file" name="banner" id="banner" class="hidden">
                    </div>
                    <div class="right">
                        <div class="title">
                            <label for="title">Titulo</label>
                            <input class="input" type="text" name="title" id="title" placeholder="Digite aqui..."
                                class="focus:ring-[#C4C4CC]" value="{{ $project->title }}">
                        </div>
                        <div class="synopsis">
                            <label for="synopsis">Sinopse</label>
                            <textarea name="synopsis" id="synopsis" placeholder="Digite aqui..." class="focus:ring-[#C4C4CC]">{{ $project->synopsis }}</textarea>
                        </div>

                        <div class="selects">
                            <div class="select">
                                <label for="type" class="">Tipo</label>
                                <select id="type" name="type"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden value="{{ $project->type }}">{{ $project->type }}
                                    </option>
                                    <option value="Manga">Manga</option>
                                    <option value="Manwha">Manwha</option>
                                    <option value="Novel">Novel</option>
                                </select>
                            </div>
                            <div class="select">
                                <label for="status" class="">Status</label>
                                <select id="status" name="status"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden value="{{ $project->status }}">{{ $project->status }}
                                    </option>
                                    <option value="Lançamento">Lançamento</option>
                                    <option value="Completo">Completo</option>
                                    <option value="Hiato">Hiato</option>
                                </select>
                            </div>
                            <div class="select hidden">
                                <label for="genres" class="">
                                    Gêneros
                                </label>
                                <select id="genres" name="genres[]" multiple
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden>Selecione aqui</option>
                                    @foreach ($project->genres as $genre)
                                        <option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select">
                                <label for="released" class="">Lançado em</label>
                                <input  class="input" type="number" name="released" id="released" placeholder="Digite aqui..."
                                    class="focus:ring-[#C4C4CC]">
                            </div>
                        </div>

                        <div class="author-studio">
                            <div class="author">
                                <div>
                                    <label for="author" class="">Autor</label>
                                    <select id="author" name="author_id"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                        <option selected></option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button data-modal-target="author-modal" data-modal-toggle="author-modal" class=""
                                    type="button">
                                    <img src="/img/svg/plus.svg" alt="">
                                </button>
                            </div>
                            <div class="studio">
                                <div>
                                    <label for="studio" class="">Estudio</label>
                                    <select id="studio" name="studio_id"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                        <option selected></option>
                                        @foreach ($studios as $studio)
                                            <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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

    <x-modal.default id="author-modal" title="Adicionar Ator">
        <x-form action="{{ route('author.store') }}">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC] mb-5">
            <div class="flex  space-x-6">
                <button data-modal-hide="author-modal" type="reset" class="btn-s">Cancelar</button>
                <button data-modal-hide="author-modal" type="submit" class="btn-p">Cadastrar</button>
            </div>
        </x-form>

    </x-modal.default>
    <x-modal.default id="studio-modal" title="Adicionar Estúdio">
        <x-form action="{{ route('author.store') }}">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC] mb-5">
            <div class="flex  space-x-6">
                <button data-modal-hide="studio-modal" type="button" class="btn-s">Cancelar</button>
                <button data-modal-hide="studio-modal" type="submit" class="btn-p">Cadastrar</button>
            </div>
        </x-form>
    </x-modal.default>
@endsection
