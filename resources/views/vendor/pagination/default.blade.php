@if ($paginator->hasPages())
    <ul class="list-pagination clearfix">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="pag-item pag-prev disabled"><span>&laquo;</span></li>
        @else
            @php
            $pg = explode('page=', $paginator->previousPageUrl())[1];
            @endphp
            <li class="pag-item pag-prev"><a href="{{ $paginator->previousPageUrl() }}"
                                             data-filter-name="page"
                                             data-filter-val="{{ $pg }}"
                                             rel="prev">&laquo;</a></li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="pag-item disabled"><span>{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pag-item active"><span>{{ $page }}</span></li>
                    @else
                        <li class="pag-item"><a href="{{ $url }}"
                                                data-filter-name="page"
                                                data-filter-val="{{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            @php
                $pg = explode('page=', $paginator->nextPageUrl())[1];
            @endphp
            <li class="pag-item pag-next"><a href="{{ $paginator->nextPageUrl() }}"
                                             data-filter-name="page"
                                             data-filter-val="{{ $pg }}"
                                             rel="next">&raquo;</a></li>
        @else
            <li class="pag-item pag-next disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
