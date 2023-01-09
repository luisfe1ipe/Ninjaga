@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

  <x-form action="{{ route('studio.store') }}">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" class="focus:ring-[#C4C4CC]">
    <button type="reset" class="btn-s">Cancelar</button>
    <button type="submit" class="btn-p">Cadastrar</button>  
  </x-form>
    
@endsection
