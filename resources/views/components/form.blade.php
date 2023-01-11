@props(['action', 'method' => Null])

@php
    if(!$method){
        $method = 'POST';
    }    
@endphp

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST'}}" enctype="multipart/form-data">
    @csrf
    @if ($method != 'POST' || $method != 'GET')
        @method($method)
    @endif

    {{$slot}}
</form>
