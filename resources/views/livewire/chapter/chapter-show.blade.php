<div>
    <div class="py-8  relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-100 bg-white rounded-md dark:bg-transparent dark:text-white">
                <div class="w-full flex justify-center items-center gap-2 text-gray-900 dark:text-white">
                    <h1 class="font-extrabold text-4xl">{{ $project->title  }}</h1>
                    <p class="text-3xl">- Capítulo {{$chapter->number}}</p>
                </div>
                <div class="w-full flex justify-between mt-16">
                    <div class="flex text-gray-900 dark:text-white dark:bg-[#121212] text-sm">
                        <ol class="inline-flex items-center space-x-1 md:space-x">
                            <li class="inline-flex items-center">
                                <a href="{{route('home')}}"
                                   class="inline-flex items-center text-sm font-medium hover:text-red-500">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Inicio
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{route('project.show', ['id' => $project->id])}}"
                                       class="ml-1 text-sm font-medium hover:text-red-500">
                                        {{$project->title}}
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <a class="ml-1 text-sm font-medium text-[#6b7280]">Capítulo {{ $chapter->number }}
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <div class="flex items-center gap-5">
                        @if($existPreviousChapter)
                            <button wire:click="previousChapter"
                                    class="inline-flex items-center px-2 py-1 bg-red-500   border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 focus:bg-red-700 dark:focus:bg-red-700 active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                <span class="material-symbols-outlined rotate-180">
                                    keyboard_double_arrow_right
                                 </span>
                                Anterior
                            </button>
                        @endif
                        @if($existNextChapter)
                            <button wire:click="nextChapter"
                                    class="inline-flex items-center px-2 py-1 bg-blue-500   border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 focus:bg-red-700 dark:focus:bg-red-700 active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                Próximo
                                <span class="material-symbols-outlined">
                                keyboard_double_arrow_right
                             </span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="w-full flex flex-col justify-center mt-20">
                    @foreach($chapter->images as $image)
                        <img src="{{$image}}">
                    @endforeach
                </div>
                <div class="mt-20">
                    <x-my.title icon="chat_bubble" colorIcon="text-red-500" sizeIcon="text-3xl" text="Comentários - ?"/>
                </div>
            </div>
        </div>
    </div>
</div>
