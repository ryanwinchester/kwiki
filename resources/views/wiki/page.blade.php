@extends('master')


@section('content')

    <section class="wiki container">

        @include('wiki.breadcrumb')

        <div class="post">
            {!! $post !!}
        </div>

    </section>

@stop