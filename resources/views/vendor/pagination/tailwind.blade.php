@if ($paginator->hasPages())
    <nav style="background-color: #121212 !important;" role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="mt-[60px] flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#a93f3f63] bg-[#000000] border border-[#121212] cursor-default leading-5 rounded-md">
                    <i class="material-symbols-outlined rotate-180 mr-1">
                        navigate_next
                    </i>
                    {!! __('Anterior') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#A93F3F] bg-[#000000] border border-[#121212] leading-5 rounded-md hover:bg-[#A93F3F] hover:text-[#F2F2F2] focus:z-10 focus:outline-none focus:ring ring-red-400 focus:border-red-400 active:bg-[#A93F3F] active:text-[#F2F2F2] transition ease-in-out duration-150">
                    <i class="material-symbols-outlined rotate-180 mr-1">
                        navigate_next
                    </i>
                    {!! __('Anterior') !!}

                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-[#A93F3F] bg-[#000000] border border-[#121212] leading-5 rounded-md hover:bg-[#A93F3F] hover:text-[#F2F2F2] focus:z-10 focus:outline-none focus:ring ring-red-400 focus:border-red-400 active:bg-[#A93F3F] active:text-[#F2F2F2] transition ease-in-out duration-150">
                    {!! __('Próximo') !!}
                    <i class="material-symbols-outlined ml-1">
                        navigate_next
                    </i>
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-[#a93f3f63] bg-[#000000] border border-[#121212] cursor-default leading-5 rounded-md">
                    {!! __('Próximo') !!}
                    <i class="material-symbols-outlined ml-1">
                        navigate_next
                    </i>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Exibindo') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('a') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('de') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('resultados') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="mr-[4px] relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#a93f3f63] bg-[#000000] border border-[#121212] cursor-default rounded-l-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="mr-[4px] relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#A93F3F] bg-[#000000] border border-[#121212] rounded-l-md leading-5 hover:bg-[#A93F3F] hover:text-[#F2F2F2] focus:z-10 focus:outline-none focus:ring ring-red-400 focus:border-red-400 active:bg-[#A93F3F] active:text-[#F2F2F2] transition ease-in-out duration-150"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-[#000000] border border-[#121212] cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2  text-sm font-medium text-[#F2F2F2] bg-[#A93F3F] border border-[#121212] cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2  text-sm font-medium text-[#A93F3F] bg-[#000000] border border-[#121212] leading-5 hover:bg-[#A93F3F] hover:text-[#F2F2F2] focus:z-10 focus:outline-none focus:ring ring-red-400 focus:border-red-400 active:bg-[#A93F3F] active:text-[#F2F2F2] transition ease-in-out duration-150"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="ml-[4px] relative inline-flex items-center px-2 py-2  text-sm font-medium text-[#A93F3F] bg-[#000000] border border-[#121212] rounded-r-md leading-5 hover:bg-[#A93F3F] hover:text-[#F2F2F2] focus:z-10 focus:outline-none focus:ring ring-red-400 focus:border-red-400 active:bg-[#A93F3F] active:text-[#F2F2F2] transition ease-in-out duration-150"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="ml-[4px] relative inline-flex items-center px-2 py-2 text-sm font-medium text-[gray-500] bg-[#000000] border border-[#121212] cursor-default rounded-r-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
