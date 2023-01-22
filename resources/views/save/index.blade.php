@extends('components.app')
@section('title', 'Favoritos')

@section('navbar')
    <x-navbar view="" />
@endsection


@section('content')
    @isset($favorites)
        <div class="container-title mt-[80px]">
            <div class="title">
                <i class="material-symbols-outlined text-red-500">
                    favorite
                </i>
                <h2>{{ $favorites->count() }} Favoritos</h2>
            </div>
        </div>
        <div class="container-manga">
            @foreach ($favorites as $fav)
                {{-- @foreach ($projects as $project) --}}
                <div class="hidden">{{ $title = str_replace(' ', '-', $fav->project->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="
                    @if ($fav->project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($fav->project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($fav->project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $fav->project->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/" . $fav->project->banner) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $fav->project->title }}</p>
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

    @isset($completeds)
        <div class="container-title mt-[80px]">
            <div class="title">
                <i class="material-symbols-outlined text-green-500">
                    check_box
                </i>
                <h2>{{ $completeds->count() }} Lidos</h2>
            </div>
        </div>
        <div class="container-manga">
            @foreach ($completeds as $completed)
                <div class="hidden">{{ $title = str_replace(' ', '-', $completed->project->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="
                    @if ($completed->project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($completed->project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($completed->project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $completed->project->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/" . $completed->project->banner) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $completed->project->title }}</p>
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

    @isset($reads)
        <div class="container-title mt-[80px]">
            <div class="title">
                <i class="material-symbols-outlined text-orange-500">
                    bookmark
                </i>
                <h2>{{ $reads->count() }} Lerei</h2>
            </div>
        </div>
        <div class="container-manga">
            @foreach ($reads as $read)
                <div class="hidden">{{ $title = str_replace(' ', '-', $read->project->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="
                    @if ($read->project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($read->project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($read->project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $read->project->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/" . $read->project->banner) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $read->project->title }}</p>
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

    @isset($stops)
        <div class="container-title mt-[80px]">
            <div class="title">
                <i class="material-symbols-outlined text-slate-500">
                    lock
                </i>
                <h2>{{ $stops->count() }} Parei</h2>
            </div>
        </div>
        <div class="container-manga">
            @foreach ($stops as $stop)
                <div class="hidden">{{ $title = str_replace(' ', '-', $stop->project->title) }}</div>
                <div class="card-manga">
                    <div class="img">
                        <div class="type">
                            <img src="
                    @if ($stop->project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($stop->project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($stop->project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                alt="">
                        </div>

                        <a href="{{ route('project.show', ['id' => $stop->project->id]) }}">
                            <img class="photo-manga" src="{{ asset("projects/$title/banner/" . $stop->project->banner) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="title">
                        <p>{{ $stop->project->title }}</p>
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
