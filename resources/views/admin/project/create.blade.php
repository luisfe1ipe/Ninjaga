@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <section class="s-create">
        <div class="container-p">
            <h1>Cadastrar Obra</h1>
            <x-form action="{{ route('project.create') }}">
                <div class="form">
                    <div class="image-container">
                        <label for="imageProject">
                            Escolha uma imagem
                            <div class="content">
                                <div class="icon" id="robson">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 " fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p>Clique para fazer upload</p>
                        </div>
                        <img id="photo" src="{{ asset('') }}" alt="">
                            </div>
                        </label>
                        <input type="file" name="image" id="imageProject" class="hidden">

                    </div>
                    <div class="right">
                        <div class="title">
                            <label for="title">Titulo</label>
                            <input type="text" name="title" id="title" placeholder="Digite aqui..."
                                class="focus:ring-[#C4C4CC]">
                        </div>
                        <div class="synopsis">
                            <label for="synopsis">Sinopse</label>
                            <textarea name="synopsis" id="synopsis" placeholder="Digite aqui..." class="focus:ring-[#C4C4CC]"></textarea>
                        </div>

                        <div class="selects">
                            <div class="select">
                                <label for="type" class="">Tipo</label>
                                <select id="type"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden>Escolha aqui</option>
                                    <option value="">Manga</option>
                                    <option value="">Manwha</option>
                                    <option value="">Novel</option>
                                </select>
                            </div>
                            <div class="select">
                                <label for="status" class="">Status</label>
                                <select id="status"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden>Escolha aqui</option>
                                    <option value="">Lançamento</option>
                                    <option value="">Completo</option>
                                    <option value="">Hiato</option>
                                </select>
                            </div>
                            <div class="select">
                                <label for="generous" class="">Gêneros</label>
                                <select id="generous"
                                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                    <option disable selected hidden>Escolha aqui</option>
                                    <option value="">Ação</option>
                                    <option value="">Aventura</option>
                                    <option value="">Shounen</option>
                                </select>
                            </div>
                            <div class="select">
                                <label for="released" class="">Lançado em</label>
                                <input type="number" name="released" id="released" placeholder="Digite aqui..."
                                    class="focus:ring-[#C4C4CC]">
                            </div>
                        </div>

                        <div class="author-studio">
                            <div class="author">
                                <div>
                                    <label for="author" class="">Autor</label>
                                    <select id="author"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                        <option selected></option>
                                        <option value="">Manga</option>
                                        <option value="">Manwha</option>
                                        <option value="">Novel</option>
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
                                    <select id="studio"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                        <option selected></option>
                                        <option value="">Manga</option>
                                        <option value="">Manwha</option>
                                        <option value="">Novel</option>
                                    </select>
                                </div>
                                <div class="more">
                                    <button data-modal-target="studio-modal" data-modal-toggle="studio-modal" class=""
                                        type="button">
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
                        <div class="image">
                            <label for="image-1">
                                <div class="content">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-[#7C7C8A]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p>Clique para fazer upload</p>
                                </div>
                                1° Foto
                            </label>
                            <input type="file" name="image-1" id="image-1" class="hidden">
                        </div>

                        <div class="image">
                            <label for="image-2">
                                <div class="content">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-[#7C7C8A]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p>Clique para fazer upload</p>
                                </div>
                                2° Foto
                            </label>
                            <input type="file" name="image-2" id="image-2" class="hidden">
                        </div>

                        <div class="image">
                            <label for="image-3">
                                <div class="content">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-[#7C7C8A]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p>Clique para fazer upload</p>
                                </div>
                                3° Foto
                            </label>
                            <input type="file" name="image-3" id="image-3" class="hidden">
                        </div>
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
            <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC]">
            <button type="reset" class="btn-s">Cancelar</button>
            <button type="submit" class="btn-p">Cadastrar</button>
        </x-form>

    </x-modal.default>
    <x-modal.default id="studio-modal" title="Adicionar Estúdio">
        <x-form action="{{ route('author.store') }}">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC]">
            <button type="reset" class="btn-s">Cancelar</button>
            <button type="submit" class="btn-p">Cadastrar</button>
        </x-form>
    </x-modal.default>
@endsection
