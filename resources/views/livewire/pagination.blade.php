@if ($paginator->hasPages())
    <ul class="pagination mx-auto my-5 text-center justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link p-3" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <button class="page-link p-3" wire:click="previousPage" rel="prev">&lsaquo;</button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link p-3">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page === $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link p-3">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><button class="page-link p-3" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <button class="page-link p-3" wire:click="nextPage" rel="next">&rsaquo;</button>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link p-3" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
