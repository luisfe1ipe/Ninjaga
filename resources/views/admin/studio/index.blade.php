@extends('components.app')
@section('navbar')
    <x-navbar view="" />
@endsection
@section('content')

    <ul>
      @foreach ($studios as $studio)
        <li>
          {{ $studio->name }}
        </li>
      @endforeach
    </ul>

@endsection
