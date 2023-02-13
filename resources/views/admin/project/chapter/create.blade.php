@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <div class="title flex items-center gap-2" id="titlePage">
        <h2>Adicionar capitulo - </h2>
        <p>{{ $project->title }}</p>
    </div>

    <form action="{{ route('chapter.store', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="titleChapter">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" placeholder="Digite aqui..."
                class="input focus:ring-[#C4C4CC]">
            <input type="hidden" name="formated_title">
        </div>

        <div class="images">
            <div class="image-chapter">
                <label for="">Banner do capítulo</label>
                <div class="preview-image-chapter">
                    <div class="card-chapter">
                        <label class="img z-50" for="image_chapter">

                            <p class="absolute">Clique para fazer upload</p>

                            <img class="bannerChapter" src="" alt="">
                        </label>
                        <input class="hidden inputBannerChapter" type="file" name="image_chapter" id="image_chapter">
                        <div class="content">
                            <div class="content">
                                <p>Titulo do capitulo</p>
                                <span>
                                    Data do capitulo
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-chapter">
                        <label class="img z-50" for="">
                            <div class="read">lido</div>
                            <img class="bannerChapter" src="" alt="">
                        </label>
                        <input class="input hidden" type="file" name="">
                        <div class="content">
                            <div class="content">
                                <p>Titulo do capitulo</p>
                                <span>
                                    Data do capitulo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <p>Imagens do capítulo</p>
                <div class="btn">
                    <a class="" id="add" type="button">
                        <i class="material-symbols-outlined">
                            add
                        </i>
                        Adicionar
                    </a>
                    <a id="remove">
                        <i class="material-symbols-outlined">
                            delete
                        </i>
                        Remover
                    </a>
                </div>
            </div>
            <ul id="list">

            </ul>
        </div>
        <button type="submit" class="btn-p mt-[24px]">Enviar</button>
    </form>
@endsection

@section('scriptChapterCreate')
    <script>
        var add = document.getElementById('add');
        var remove = document.getElementById('remove');
        var cont = 0

        add.addEventListener('click', function(e) {
            var newInput = document.createElement('input');
            newInput.setAttribute('name', 'img[]')
            newInput.setAttribute('id', `img-${cont}`)
            newInput.type = "file";
            var newListItem = document.createElement('li');
            newListItem.appendChild(newInput);
            var list = document.getElementById('list');
            list.appendChild(newListItem);
            newInput.classList.add("input", "trash", `chapterImage`);
            cont++
        });

        remove.addEventListener('click', function(e) {
            var inputs = Array.from(document.getElementsByClassName('trash'));
            var input = inputs.pop()
            input.remove()
        })

    </script>
@endsection
@section('scriptPreviewBannerChapter')
    <script>
        let photo = document.querySelectorAll('.bannerChapter')
        let file = document.querySelector('.inputBannerChapter')

        photo.forEach((c) => {
            c.addEventListener('click', () => {
                file.click()
            })


            file.addEventListener('change', (event) => {

                let reader = new FileReader();

                reader.onload = () => {
                    c.src = reader.result
                }

                reader.readAsDataURL(file.files[0])
            })
        })
    </script>
@endsection
