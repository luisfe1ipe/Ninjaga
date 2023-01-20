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
                                <a href="" class="hover:text-red-500">
                                    <span class="material-symbols-outlined">favorite</span>
                                    254 Favoritos
                                </a>

                            </li>
                            <li>
                                <a href="" class="hover:text-green-500">
                                    <span class="material-symbols-outlined">check</span>
                                    154 Lidos
                                </a>
                            </li>
                            <li>
                                <a href="" class="hover:text-yellow-500">
                                    <span class="material-symbols-outlined">bookmark</span>
                                    78 Lerei
                                </a>
                            </li>
                            <li>
                                <a href="" class="hover:text-gray-500">
                                    <span class="material-symbols-outlined">block</span>
                                    54 Parei
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

@endsection
