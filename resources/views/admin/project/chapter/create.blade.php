@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <div class="title flex items-center gap-2">
        <h2><strong>Adicionar capitulo - </strong>{{ $project->title }}</h2>
    </div>

    <form action="{{ route('chapter.store', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="title">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" placeholder="Digite aqui..." class="input focus:ring-[#C4C4CC]">
            <input type="hidden" name="formated_title">
        </div>

        <div class="images">
            <div class="image-chapter">
                <label for="image_chapter">Imagem do capítulo</label>
                <input class="input" type="file" name="image_chapter" id="image_chapter">
            </div>
            <div class="header">
                <p>Imagens</p>
                <a class="" id="add" type="button">
                    <img src="/img/svg/plus.svg" alt="">
                </a>
                <a id="remove">Remover</a>
            </div>
            <ul id="list">

            </ul>
        </div>
        <button type="submit" class="bg-red-500">Enviar</button>
    </form>
@endsection

@section('scriptChapterCreate')
    <script>
        var add = document.getElementById('add');
        var remove = document.getElementById('remove');

        add.addEventListener('click', function(e) {
            var newInput = document.createElement('input');
            newInput.setAttribute('name', 'img[]')
            newInput.type = "file";
            var newListItem = document.createElement('li');
            newListItem.appendChild(newInput);
            var list = document.getElementById('list');
            list.appendChild(newListItem);
            newInput.classList.add("input", "trash");;
            return number++;
        });

        remove.addEventListener('click', function(e) {


            var inputs = Array.from(document.getElementsByClassName('trash'));
            var input = inputs.pop()
            input.remove()
        })
    </script>
@endsection
