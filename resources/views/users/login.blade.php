@extends('components.app')
@section('title', 'Login')

<div class="container-form">
    <div class="header">
        <img class="logo" src="{{ asset('img/logo-2.svg') }}" alt="">
        <p>Faça login e acesse sua conta para ver suas séries favoritas.</p>
    </div>
    <form action="">
        <label for="user">
            E-mail ou nome do usuário
            <input type="text" name="user" id="user" placeholder="Nome de usuário">
        </label>

        <label for="password">
            Senha
            <input type="password" name="password" id="password" placeholder="•••••••••••••">
        </label>

        <button type="submit">Entrar</button>
    </form>
    <a href="">Não tem uma conta ? clique aqui !</a>
</div>