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
                    <x-preview.banner name="banner" />
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
                                <label for="generous" class="">
                                    Gêneros
                                </label>
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
                                    <select id="studio"
                                        class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                                        <option selected></option>
                                        @foreach ($studios as $studio)
                                            <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                                        @endforeach
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
