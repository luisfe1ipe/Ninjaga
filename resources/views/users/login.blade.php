@extends('components.app')
@section('title', 'Login')

<div class="container-form">
    <div class="header">
        <img class="logo" src="{{ asset('img/logo-2.svg') }}" alt="">
        <p>Faça login e acesse sua conta para ver suas séries favoritas.</p>
    </div>
    <form action="{{ route('user.auth') }}" method="POST">
        @csrf
        <label for="email">
            E-mail
            <input class="input" type="text" name="email" id="email" placeholder="Digite aqui">
        </label>

        <label for="password">
            Senha
            <input class="input" type="password" name="password" id="password" placeholder="•••••••••••••">
        </label>

        <button type="submit">Entrar</button>
    </form>
    <a href="{{ route('user.create') }}">Não tem uma conta ? clique aqui !</a>
</div>

<style>
    footer{
        display: none
    }
</style>