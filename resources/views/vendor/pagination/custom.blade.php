@if ($paginator->hasPages())
    <div class="df_jcsb mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="previous-btn disabled"><i class="far fa-arrow-left"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="previous-btn"><i class="far fa-arrow-left"></i></a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next-btn"><i class="far fa-arrow-right"></i></a>
        @else
            <a class="next-btn disabled"><i class="far fa-arrow-right"></i></a>
        @endif
    </div>
@endif
