@extends('components.app')
@section('title', $genre->name)
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')
    <div class="container-title mt-[80px]">
        <div class="title">
            <h2>{{ $genre->projects->count() }} {{ $genre->name }}</h2>
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
        @foreach ($genre->projects as $project)
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
                <div class="caps flex items-center">
                    <div class="cap-p">
                        <div class="link">
                            <x-buttom.cap route="{{ route('project.show', ['id' => $project->id]) }}">
                                {{ $project->chapters->count() }} Capítulos
                            </x-buttom.cap>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
