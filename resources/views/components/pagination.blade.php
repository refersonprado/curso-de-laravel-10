@if (isset($paginator))

    @php
        $queryParams = isset($appends) && gettype($appends) === 'array' ? '&' . http_build_query($appends) : '';
    @endphp

    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between py-3">
        <div class=" flex items-center justify-center gap-4">
        {{-- Previous Page Link --}}
        @if ($paginator->isFistPage())
            <span
                class="relative inline-flex items-center   px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.previous') !!}
                {{ $paginator->getNumberPreviousPage() }}
            </a>
        @endif
        @if (!$paginator->isFistPage())
        <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev"
            class="text-slate-50">
            {{ $paginator->getNumberPreviousPage() }}
        </a>
        @endif
            <p class="text-slate-400">{{$paginator->currentPage()}}</p>
        @if (!$paginator->isLastPage())
        <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="prev"
            class="text-slate-50">
            {{ $paginator->getNumberNextPage() }}
        </a>
        @endif
        
            
            
        {{-- Next Page Link --}}
        @if (!$paginator->isLastPage())
            <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                {!! __('pagination.next') !!}
            </span>
        @endif
        </div>
        <p class="text-slate-50 flex text-end">Suportes por página: <span class="bg-slate-400 rounded-full flex w-fit ml-3 text-gray-950 font-medium px-2">{{$paginator->totalPerPage()}}</span></p>
    </nav>
@endif
