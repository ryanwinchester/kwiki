
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    @if (! empty($breadcrumbs[0]))
        @foreach ($breadcrumbs as $i => $crumb)
            <li><a href="/{{  implode('/', array_slice($breadcrumbs, 0, $i+1)) }}">{{ $crumb }}</a></li>
        @endforeach
    @endif
</ol>
