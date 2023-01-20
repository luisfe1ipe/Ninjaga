@extends('components.app')
@section('navbar')
    <x-navbar view="manwha" />
@endsection
@section('content')
    <div class="container-title mt-[80px]">
        <div class="title">
            <i class="material-symbols-outlined text-[#A93F3F]">
                library_books
            </i>
            <h2>{{ $projects->count() }} Obras</h2>
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
        <div class="hidden">{{$title = str_replace(" ", "-", $project->title)}}</div>
        <div class="card-manga">
            <div class="img">
                <div class="type">
                    <img src="
                    @if ($project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                " alt="">
                </div>

                <a href="{{ route('project.show', ['id' => $project->id]) }}">
                    <img class="photo-manga" src="{{ asset("projects/$title/banner/$project->banner") }}" alt="">
                </a>
            </div>
            <div class="title">
                <p>{{$project->title}}</p>
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
@endsection
