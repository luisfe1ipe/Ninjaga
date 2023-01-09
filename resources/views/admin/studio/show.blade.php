@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

  <h1>Estúdio - {{ $studio->name }}</h1>

  <x-form action="{{ route('studio.destroy', ['id' => $studio->id]) }}" method="DELETE" >
    <button type="submit" class="btn-p">Excluir</button>  
  </x-form>
    
@endsection
