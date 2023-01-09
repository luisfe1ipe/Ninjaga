@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

  <h1>Artista - {{ $artist->name }}</h1>

  <x-form action="{{ route('artist.destroy', ['id' => $artist->id]) }}" method="DELETE" >

    <button type="submit" class="btn-p">Excluir</button>  
  </x-form>
    
@endsection
