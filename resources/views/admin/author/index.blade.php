@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

    <ul>
      @foreach ($authors as $author)
        <li>
          {{ $author->name }}
        </li>
      @endforeach
    </ul>

@endsection
