@props([
    'icon' => null,
    'class_icon' => null,
    'gIcon' => null,
    'route',
])

<li>
    <a href="{{ $route }}" 
    {{
    $attributes->merge([
        "class" =>"block px-4 py-2 text-sm hover:bg-[#000000] text-white flex items-center gap-1.5 "
        ])
    }}>
    @if ($icon)
    <i class="material-icons text-lg {{ $class_icon }}">{{ $icon }}</i>
    @endif
    @if ($gIcon)
        <span class="material-symbols-outlined">{{$gIcon}}</span>
    @endif
        {{ $slot }}
    </a>
</li>

