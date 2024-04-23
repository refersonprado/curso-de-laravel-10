@extends('admin.layouts.app')
@section('header')
    @include('admin.supports.partials.header.header')
@endsection

@section('content')
    <div class="flex align-middle py-4 justify-between text-slate-50">
        <h1 class="text-2xl">Suportes</h1>
        <p class="my-auto items-center flex">Quantidade de suportes: <span class="bg-slate-400 rounded-full flex w-fit ml-3 text-gray-950 font-medium px-2">{{ $supports->total() }}</span></p>
    </div>

<div class="flex justify-between">
    <form action="{{ route('supports') }}" method="get">
        <input name="filter" type="text" placeholder="Procurar" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" value="{{ $filters['filter'] ?? '' }}">
    </form>
    <div class="flex gap-3 text-slate-50 font-medium">
        <a href="{{ route('supports', ['status' => 'a']) }}">ATIVO</a>
        <a href="{{ route('supports', ['status' => 'c']) }}">FECHADO</a>
        <a href="{{ route('supports', ['status' => 'p']) }}">ABERTO</a>
    </div>
</div>

    

    <div class="w-full my-4 border-b border-slate-500">
        @include('admin.supports.partials.list.top_bar_list')
        @include('admin.supports.partials.list.list')
    </div>
    <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
