@extends('components.app')
@section('title', 'Registre-se')

<div class="container-form">
    <div class="header">
        <img class="logo" src="{{ asset('img/logo-2.svg') }}" alt="">
        <p>Crie uma conta para ter acesso a todas as funcionalidade do site</p>
    </div>
    <form action="{{ route('user.register') }}" method="POST">
        @csrf
        <label for="user">
            Digite um nome de usuário
            <input type="text" name="user" id="user" placeholder="Nome de usuário">
        </label>

        <label for="email">
            Digite seu e-mail
            <input type="email" name="email" id="email" placeholder="exemplo@exemplo.com">
        </label>

        <label for="password">
            Digite sua senha
            <input type="password" name="password" id="password" placeholder="•••••••••••••">
        </label>

        <label for="confirmed_password">
            Confirme sua senha
            <input type="password" name="confirmed_password" id="confirmed_password" placeholder="•••••••••••••">
        </label>

        <button type="submit">Registrar-se</button>
    </form>
</div>

