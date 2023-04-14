<div aria-label="Page navigation example">
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a class="disabled"><span>&laquo;</span></a>
        @else
            <a><a class="page-link" style="font-size: 150%;"
                  aria-label="Previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a class="disabled"><span>{{ $element }}</span></a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active"><span>{{ $page }}</span></a>
                    @else
                        <a><a href="{{ $url }}">{{ $page }}</a></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></a>
        @else
            <a class="disabled"><span>&raquo;</span></a>
        @endif
    </div>
</div>



<div aria-label="Page navigation example">
    <div class="pagination">
        <a class="page-item">
            <a class="page-link" style="font-size: 150%;" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </a>
        <a class="page-item"><a style="font-size: 150%;" class="page-link" href="#">1</a></a>
        <a class="page-item"><a style="font-size: 150%;" class="page-link" href="#">2</a></a>
        <a class="page-item"><a style="font-size: 150%;" class="page-link" href="#">3</a></a>
        <a class="page-item"><a style="font-size: 150%;" class="page-link" href="#">4</a></a>
        <a class="page-item"><a style="font-size: 150%;" class="page-link" href="#">5</a></a>
        <a class="page-item">
            <a class="page-link" style="font-size: 150%;" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </a>
    </div>
</div>
