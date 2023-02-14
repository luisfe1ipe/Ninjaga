@extends('components.app')
@section('title', "{$chapter->project->title} - {$chapter->title}")

@section('navbar')
    <x-navbar view="" />
@endsection


<div class="rollback">
    <a href="#start">
        <span class="material-symbols-outlined">
            north
        </span>
    </a>
</div>

@section('content')
    <style>
        .scale-manwha {
            width: 720px;
        }

        .scale-manga {
            min-width: 720px;
            max-width: 100%;
        }
    </style>

    <section class="s-view-chapter" id="start">
        <div class="header">
            <div class="title">
                <h1><a href="{{ route('project.show', ['id' => $chapter->project->id]) }}">{{ $chapter->project->title }}</a> - </h1>
                <p> {{ $chapter->title }} </p>
            </div>
            <div class="sub">
                <div class="flex bg-[#121212] nav" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('project.index') }}"
                                class="inline-flex items-center text-sm font-medium hover:text-[#A93F3F]">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('project.show', ['id' => $chapter->project->id]) }}"
                                    class="ml-1 text-sm font-medium hover:text-[#A93F3F]">{{ $chapter->project->title }}
                                </a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a class="ml-1 text-sm font-medium text-[#6b7280]">{{ $chapter->title }}
                                </a>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="container-btns">
                    <div class="btns">



                        <a href="">
                            <span class="material-symbols-outlined">
                                keyboard_backspace
                            </span>
                            Anterior
                        </a>



                        <select onchange='location.href=this.value' name="" id=""
                            class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                            <option disable selected hidden>{{ $chapter->title }}</option>
                            @foreach ($chapter->project->chapters as $chap)
                                <option
                                    value="{{ route('chapter.show', ['id' => $chapter->project->id, 'chapter_id' => $chap->id]) }}">
                                    {{ $chap->title }}</option>
                            @endforeach
                        </select>


                        <a href="">
                            Proximo
                            <span class="material-symbols-outlined next">
                                keyboard_backspace
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>


        <div class="chapter-imgs">
            @for ($i = 0; $i < count($chapter->img); $i++)
                <img class="
                    @if ($chapter->project->type == 'Manwha') scale-manwha @endif
                    @if ($chapter->project->type == 'Manga') scale-manga @endif
                "
                    src="{{ asset("projects/" . $chapter->project->formated_title . "/chapters/$chapter->formated_title/" . $chapter->img[$i]) }}"
                    alt="">
            @endfor
        </div>

        <div class="bottom">
            <div class="btns">

                <a href="">
                    <span class="material-symbols-outlined">
                        keyboard_backspace
                    </span>
                    Anterior
                </a>


                <select onchange='location.href=this.value' name="" id=""
                    class="bg-[#202024] text-[#C4C4CC] text-sm rounded-lg block w-full p-2.5 focus:ring-[#C4C4CC]">
                    <option disable selected hidden>{{ $chapter->title }}</option>
                    @foreach ($chapter->project->chapters as $chap)
                        <option value="{{ route('chapter.show', ['id' => $chapter->project->id, 'chapter_id' => $chap->id]) }}">
                            {{ $chap->title }}
                        </option>
                    @endforeach
                </select>
                <a href="">
                    Proximo
                    <span class="material-symbols-outlined next">
                        keyboard_backspace
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
