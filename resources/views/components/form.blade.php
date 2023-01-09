@props(['action', 'method' => Null])

@php
    if(!$method){
        $method = 'POST';
    }    
@endphp

<form action="{{ $action }}" method="{{ $method === 'POST' ? 'POST' : 'GET'}}">
    @csrf
    @if ($method != 'POST')
        @method($method)
    @endif

    {{$slot}}
</form>
