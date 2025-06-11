@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 rounded-l-lg bg-[#1e1e1e] text-white cursor-default select-none">‹</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 rounded-l-lg bg-[#1e1e1e] text-white hover:bg-[#232323]">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 bg-[#1e1e1e] text-white select-none">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 bg-[#1e1e1e] text-white font-bold rounded">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 bg-[#1e1e1e] text-white hover:bg-[#232323] rounded">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 rounded-r-lg bg-[#1e1e1e] text-white hover:bg-[#232323]">›</a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 rounded-r-lg bg-[#1e1e1e] text-white cursor-default select-none">›</span>
                </li>
            @endif
        </ul>
    </nav>
@endif