@extends('master')


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