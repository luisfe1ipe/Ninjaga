    <div class="flex flex-col gap-3 w-44 h-auto text-gray-900 dark:text-white">
        <div wire:click='openProject({{$project->id}})' class="group cursor-pointer">
            <div class="relative w-44 h-60 overflow-hidden rounded-md mb-3">
                <div class="top-0 right-0 absolute rounded-bl-lg px-2 text-white py-[2px] backdrop-opacity-60"
                    style="background-color: {{ $project->type->color }};">
                    <p class="uppercase font-semibold text-xs">
                        {{ $project->type->name }}
                    </p>
                </div>
                <img class="rounded-md w-full h-full hover:scale-110 transition ease-in" src="{{ $project->banner }}"
                    alt="">
            </div>
            <div class="text-center">
                <p class="truncate group-hover:text-red-500">{{ $project->title }}</p>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            @foreach ($project->chapters->sortByDesc('created_at')->take(2) as $chapter)
                <div class="flex justify-between items-center">
                    <div wire:click='openChapter({{$project->id}}, {{$chapter->id}})'
                        class="cursor-pointer px-2 py-1 w-1/2 text-center font-medium text-sm bg-white hover:bg-gray-100 border border-gray-300 dark:border-none dark:bg-[#222222] dark:hover:bg-[#0B0B0B] rounded-md">
                        Cap. {{ $chapter->number }}
                    </div>
                    <p class="text-xs truncate dark:text-gray-300">
                        <?php
                        if (date('M') == \Carbon\Carbon::parse($chapter->created_at)->format('M')) {
                            echo \Carbon\Carbon::parse($chapter->created_at)->diffForHumans();
                        } else {
                            echo \Carbon\Carbon::parse($chapter->created_at)->isoFormat('d MMMM, Y');
                        }
                        ?>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
