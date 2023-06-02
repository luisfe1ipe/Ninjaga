<a href="{{route('project.show', ['id' => $project->id])}}" class="group">
    <div class="flex flex-col gap-3 w-44 h-auto cursor-pointer text-gray-900 dark:text-white">
        <div class="relative w-44 h-60 overflow-hidden rounded-md">
            <div class="top-0 right-0 absolute rounded-bl-lg px-2 py-[2px] backdrop-opacity-60">
{{--                 style="background-color: {{ $project->type->color }};">--}}
                <p class="uppercase font-semibold text-xs">
{{--                    {{ $project->type->name }}--}}
                </p>
            </div>
            <img class="rounded-md w-full h-full hover:scale-110 transition ease-in"
                 src="{{$project->getRawOriginal('banner')}}" alt="">
        </div>
        <div class="text-center">
            <p class="truncate group-hover:text-red-500">{{ $project->title }}</p>
        </div>
    </div>
</a>
