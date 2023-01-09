@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

  <h1>Editar Estúdio - {{ $studio->name }}</h1>

  <x-form action="{{ route('studio.update', ['id' => $studio->id]) }}" method="PUT" >
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC]" value="{{ $artist->name }}">
    <button type="reset" class="btn-s">Cancelar</button>
    <button type="submit" class="btn-p">Cadastrar</button>  
  </x-form>
    
@endsection
