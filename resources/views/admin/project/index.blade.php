@extends('components.app')
@section('title', 'Início')
@section('navbar')
    <x-navbar view="obras"/>
@endsection
@section('content')
    @isset($projects)
        <div class="container-title mt-[80px]">
            <div class="title">
                <span class="material-symbols-outlined text-[#A93F3F]">
                    update
                </span>
                <h2>Atualizados recentemente</h2>
            </div>
            <div class="order-by">
                <ul>
                    <li>
                        <a href="">Nao sei</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-manga">
            @foreach ($projects as $project)
                <div class="hidden">{{ $title = str_replace(' ', '-', $project->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="
                    @if ($project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $project->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/$project->banner") }}"
                                alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $project->title }}</p>
                    </div>
                    <div class="caps">
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <img src="{{ asset('img/new-1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <span>
                                    1h atrás
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset

    @isset($mangas)
        <div class="container-title mt-[80px]">
            <div class="title">
                <span class="material-symbols-outlined text-[#F07504]">
                    library_books
                </span>
                <h2>{{ $mangas->count() }} Mangas</h2>
            </div>
            <div class="order-by">
                <ul>
                    <li>
                        <a href="">Nao sei</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-manga">
            @foreach ($mangas as $manga)
                <div class="hidden">{{ $title = str_replace(' ', '-', $manga->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="{{ asset('img/type-manga.png') }}" alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $manga->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/$manga->banner") }}" alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $manga->title }}</p>
                    </div>
                    <div class="caps">
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <img src="{{ asset('img/new-1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <span>
                                    1h atrás
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset

    @isset($manwhas)
        <div class="container-title mt-[80px]">
            <div class="title">
                <span class="material-symbols-outlined text-[#9B31AC]">
                    library_books
                </span>
                <h2>{{ $manwhas->count() }} Manwhas</h2>
            </div>
            <div class="order-by">
                <ul>
                    <li>
                        <a href="">Nao sei</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-manga">
            @foreach ($manwhas as $manwha)
                <div class="hidden">{{ $title = str_replace(' ', '-', $manwha->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="{{ asset('img/type-manwha.png') }}" alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $manwha->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/$manwha->banner") }}" alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $manwha->title }}</p>
                    </div>
                    <div class="caps">
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <img src="{{ asset('img/new-1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <span>
                                    1h atrás
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset

    @isset($novels)
        <div class="container-title mt-[80px]">
            <div class="title">
                <span class="material-symbols-outlined text-[#3187AC]">
                    library_books
                </span>
                <h2>{{ $novels->count() }} Novels</h2>
            </div>
            <div class="order-by">
                <ul>
                    <li>
                        <a href="">Nao sei</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-manga">
            @foreach ($novels as $novel)
                <div class="hidden">{{ $title = str_replace(' ', '-', $novel->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="{{ asset('img/type-novel.png') }}" alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $novel->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/$novel->banner") }}" alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $novel->title }}</p>
                    </div>
                    <div class="caps">
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <img src="{{ asset('img/new-1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="cap-p">
                            <div class="link">
                                <x-buttom.cap route="">Cap. 232</x-buttom.cap>
                            </div>
                            <div class="new">
                                <span>
                                    1h atrás
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset
@endsection
