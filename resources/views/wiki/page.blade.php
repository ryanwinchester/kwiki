@extends('master')

@section('title')
    <title>{{ current(array_slice($breadcrumbs, -1)) }} &ndash; Kwiki</title>
@stop

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