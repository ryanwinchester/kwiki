@extends('master')

@unless (empty($title))
    @section('title')
        <title>{{ $title }} &ndash; Dev Wiki</title>
    @stop
@endunless

@section('content')

    <section class="wiki container">

        @include('wiki.breadcrumbs')

        @if (count($index))
            @include('wiki.category-list')
        @endif

        <div class="post">
            {!! $post !!}
        </div>

    </section>

@stop
