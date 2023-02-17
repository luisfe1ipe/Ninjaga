<div x-data="{ isTyped: false }">
    <div class="relative">
        <div class="relative">
            <x-input.search />
        </div>
        {{-- search box --}}

        <div x-show="isTyped" x-cloak id="autocomplet-search"
            style="box-shadow: rgb(0 0 0) 0px 20px 20px 9px, #050708 0px 2px 4px -2px;" class="z-10 absolute  text-white bg-black w-[557px] max-h-[250px] top-[56px] rounded overflow-y-scroll left-[-140px]">
            <div>
                <div>
                    @forelse($projects as $project)
                        <div>
                            <ul>
                                <li class="z-50 my-[12px] overflow-hidden relative p-[8px]">
                                    <a href="{{ route('project.show', ['id' => $project->id]) }}"
                                        class="font-semibold  flex ">
                                        <img class="w-[80px] rounded"
                                            src="{{ asset("projects/$project->formated_title/banner/$project->banner") }}"
                                            alt="">
                                        <div class="ml-[6px] w-full overflow-hidden flex flex-col justify-between">
                                            <div>
                                                <p>{{ Str::limit($project->title, 40) }}</p>
                                                <p class="text-xs font-normal">{{$project->author->name}}</p>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                @foreach ($project->genres as $genre)
                                                    <button class="whitespace-nowrap bg-[#A93F3F] hover:bg-[#7C2F2F] text-white text-xs p-[4px] rounded shadow-md">{{ $genre->name }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </a>
                                    <img class="w-full absolute bg-cover bg-center overflow-hidden blur-[10px] brightness-50 top-0 z-[-1]"
                                        src="{{ asset("projects/$project->formated_title/banner/$project->banner") }}"
                                        alt="">
                                </li>
                            </ul>
                        </div>
                    @empty
                        <div x-cloak>
                            {{ $isEmpty }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>