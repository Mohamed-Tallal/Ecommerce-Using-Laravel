


@if ($paginator->hasPages())
        <div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate">
            <ul class="pagination">        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate_button page-item previous disabled" id="sampleTable_previous">
                <span class="page-link rounded-l rounded-sm border border-brand-light px-3 py-2 cursor-not-allowed no-underline">Previous</span></li>
        @else
            <li class="paginate_button page-item next" id="sampleTable_previous">
                <a
                class="page-link rounded-l rounded-sm border-t border-b border-l border-brand-light px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                    Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                        <li class="paginate_button page-item ">   <span class="border-t border-b border-l border-brand-light px-3 py-2 cursor-not-allowed no-underline page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                                <li class="paginate_button page-item active">  <span class="border-t border-b border-l border-brand-light px-3 py-2 bg-brand-light no-underline page-link">{{ $page }}</span></li>
                    @else
                                <li class="paginate_button page-item ">  <a class="border-t border-b border-l border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next" id="sampleTable_next">   <a class="page-link rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="paginate_button page-item previous disabled" id="sampleTable_next">   <span class="page-link rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed">Next</span></li>
        @endif
    </div>
@endif




