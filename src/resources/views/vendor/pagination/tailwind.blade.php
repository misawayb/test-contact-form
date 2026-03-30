@if ($paginator->hasPages())
@php
$elements = (new \Illuminate\Pagination\UrlWindow($paginator))->get();
$elements = array_filter([
$elements['first'],
is_array($elements['slider']) ? '...' : null,
$elements['last'],
]);
@endphp
<nav class="pagination-nav">
    {{-- 前へ --}}
    @if ($paginator->onFirstPage())
    <span class="page-item disabled">&lsaquo;</span>
    @else
    <a class="page-item" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
    @endif

    {{-- ページ番号 --}}
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="page-item active">{{ $page }}</span>
    @else
    <a class="page-item" href="{{ $url }}">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- 次へ --}}
    @if ($paginator->hasMorePages())
    <a class="page-item" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
    @else
    <span class="page-item disabled">&rsaquo;</span>
    @endif
</nav>
@endif