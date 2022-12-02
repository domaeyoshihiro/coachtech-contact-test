<div>
  @if ($paginator->hasPages())
    <nav class="p-pagination">
      <ul>
        <div class="pagenate__right">
          <div>
            @if ($paginator->onFirstPage())
                <li class="pagenate__link--first">
                  &lt;
                </li>
            @else
                <li>
                    <a class="pagenate__link--first" href="{{ $paginator->previousPageUrl() }}">
                      &lt;
                    </a>
                </li>
            @endif
          </div>
          <div class="pagenate__right">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pagenate__link">
                        {{ $element }}
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagenate__link--select">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a class="pagenate__link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
          </div>
          <div>
            @if ($paginator->hasMorePages())
                <li>
                    <a class="pagenate__link" href="{{ $paginator->nextPageUrl() }}">
                        &gt;
                    </a>
                </li>
            @else
                <li class="pagenate__link">
                    &gt;
                </li>
            @endif
          </div> 
        </div>
      
      </ul>
    </nav>
  @endif
</div>

<style>
.pagenate__right {
  display: flex;
}
.pagenate__link--first {
  font-size: 14px;
  color: #000000;
  text-decoration: none;
  border: 1px solid #C0C0C0;
  padding: 3px 5px;
}
.pagenate__link {
  font-size: 14px;
  color: #000000;
  text-decoration: none;
  border-top: 1px solid #C0C0C0;
  border-bottom: 1px solid #C0C0C0;
  border-right: 1px solid #C0C0C0;
  padding: 3px 5px;
}
.pagenate__link--select {
  font-size: 14px;
  color: #FFFFFF;
  background-color: #000000;
  border-top: 1px solid #C0C0C0;
  border-bottom: 1px solid #C0C0C0;
  border-right: 1px solid #C0C0C0;
  padding: 3px 5px;
}
</style>

