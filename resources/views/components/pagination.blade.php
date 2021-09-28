@if ($paginator->hasPages())
    <!-- Pagination -->    
        <ul id="paginationCourse" class="pagination d-flex justify-content-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span><i class="d-flex justify-content-center align-items-center arrow-border fas fa-arrow-left"></i></span>
                </li>                
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span><i class="d-flex justify-content-center align-items-center arrow-border fas fa-arrow-left"></i></span>
                    </a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="d-flex justify-content-center align-items-center page active">{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li><a class="d-flex justify-content-center align-items-center page" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled"><span><i class="d-flex justify-content-center align-items-center fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span><i class="d-flex justify-content-center align-items-center arrow-border fas fa-arrow-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span>
                        <i class="d-flex justify-content-center align-items-center arrow-border fas fa-arrow-right"></i>
                    </span>
                </li>
            @endif
        </ul>    
    <!-- Pagination -->
@endif
