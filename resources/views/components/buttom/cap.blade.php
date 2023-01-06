<a href="{{$route}}" 
{{
$attributes->merge([
    "class" =>"btn-cap"
    ])
}}>
    {{ $slot }}
</a>