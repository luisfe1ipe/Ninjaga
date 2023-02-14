@extends('components.app')
@section('title', 'Seu perfil')

@section('navbar')
    <x-navbar view="" />
@endsection

@section('content')
    <div class="container-profile">
        <div class="content">
            <div class="info">
                <img src="{{ asset("$user->photo") }}" alt="">
                <div class="text">
                    <div class="name">
                        <h2>{{ $user->user }}</h2>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="projects">
                        <ul>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'favorites']) }}" class="hover:text-red-500">
                                    <span class="material-symbols-outlined">favorite</span>
                                    {{ $user->favorites->count() }} Favoritos
                                </a>

                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'completeds']) }}" class="hover:text-green-500">
                                    <span class="material-symbols-outlined">check</span>
                                    {{ $user->completeds->count() }} Lidos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'reads']) }}" class="hover:text-yellow-500">
                                    <span class="material-symbols-outlined">bookmark</span>
                                    {{ $user->reads->count() }} Lerei
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('save.index', ['type' => 'stops']) }}" class="hover:text-gray-500">
                                    <span class="material-symbols-outlined">block</span>
                                    {{ $user->stops->count() }} Parei
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="btns">
                <a href="" class="edit">Editar Perfil</a>
                <a href="" class="logout">Sair</a>
            </div>
        </div>
    </div>

    <section class="s-favorite overflow-hidden  mt-[60px]">
        <div class="container-title">
            <div class="title">
                <i class="material-symbols-outlined text-red-500">
                    favorite
                </i>
                <h1>Favoritos</h1>
            </div>
            <form action="{{ route('save.index', ['type' => 'favorites']) }}" method="GET" class="m-0">
                <button class="btn w-[120px] p-1 rounded-[5px] bg-[#A93F3F] hover:bg-[#8A2D2D]">Ver mais</button>
            </form>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($favorites as $fav)
                    <div class="swiper-slide">
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
                                    <img class="photo-manga"
                                        src="{{ asset("projects/$title/banner/" . $fav->project->banner) }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="title">
                                <p>{{ $fav->project->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="s-completed overflow-hidden  mt-[80px]">
        <div class="container-title">
            <div class="title">
                <i class="material-symbols-outlined text-green-500">
                    check_box
                </i>
                <h1>Lidos</h1>
            </div>
            <form action="{{ route('save.index', ['type' => 'completeds']) }}" method="GET" class="m-0">
                <button class="btn w-[120px] p-1 rounded-[5px] bg-[#A93F3F] hover:bg-[#8A2D2D]">Ver mais</button>
            </form>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($completeds as $comp)
                    <div class="swiper-slide">
                        <div class="hidden">{{ $title = str_replace(' ', '-', $comp->project->title) }}</div>
                        <div class="card-manga">
                            <div class="img">
                                <div class="type">
                                    <img src="
                    @if ($comp->project->type == 'Manwha') {{ asset('img/type-manwha.png') }}
                    @elseif($comp->project->type == 'Novel')
                        {{ asset('img/type-novel.png') }}
                    @elseif($comp->project->type == 'Manga')
                        {{ asset('img/type-manga.png') }} @endif
                "
                                        alt="">
                                </div>

                                <a href="{{ route('project.show', ['id' => $comp->project->id]) }}">
                                    <img class="photo-manga"
                                        src="{{ asset("projects/$title/banner/" . $comp->project->banner) }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="title">
                                <p>{{ $comp->project->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </section>

    <section class="s-reads overflow-hidden  mt-[80px]">
        <div class="container-title">
            <div class="title">
                <i class="material-symbols-outlined text-orange-500">
                    bookmark
                </i>
                <h1>Lerei</h1>
            </div>
            <form action="{{ route('save.index', ['type' => 'reads']) }}" method="GET" class="m-0">
                <button class="btn w-[120px] p-1 rounded-[5px] bg-[#A93F3F] hover:bg-[#8A2D2D]">Ver mais</button>
            </form>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($reads as $read)
                    <div class="swiper-slide">
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
                                    <img class="photo-manga"
                                        src="{{ asset("projects/$title/banner/" . $read->project->banner) }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="title">
                                <p>{{ $read->project->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </section>

    <section class="s-stops overflow-hidden  mt-[80px]">
        <div class="container-title">
            <div class="title">
                <i class="material-symbols-outlined text-slate-500">
                    lock
                </i>
                <h1>Parei</h1>
            </div>
            <form action="{{ route('save.index', ['type' => 'stops']) }}" method="GET" class="m-0">
                <button class="btn w-[120px] p-1 rounded-[5px] bg-[#A93F3F] hover:bg-[#8A2D2D]">Ver mais</button>
            </form>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($stops as $stop)
                    <div class="swiper-slide">
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
                                    <img class="photo-manga"
                                        src="{{ asset("projects/$title/banner/" . $stop->project->banner) }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="title">
                                <p>{{ $stop->project->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </section>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 5.5,
            spaceBetween: 0,
            freemode: true,
            breakpoints: {
                320: {
                    slidesPerView: 2.1,
                    spaceBetween: 0,
                },
                991: {
                    slidesPerView: 5.5,
                    spaceBetween: 0,
                }
            }
        });
    </script>
@endsection
