@if ($paginator->hasPages())
<div class="pagination-container">
    <div class="pagination-info">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{
        $paginator->total() }} entries</div>
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">&laquo;</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" wire:click="previousPage" rel="prev">&laquo;</a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" wire:click="nextPage" rel="next">&raquo;</a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">&raquo;</span>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif