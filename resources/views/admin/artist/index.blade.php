@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

    <ul>
      @foreach ($artists as $artist)
        <li>
          {{ $artist->name }}
        </li>
      @endforeach
    </ul>

@endsection
