
<ol class="breadcrumb">
    @foreach ($breadcrumbs as $i => $crumb)
        <li><a href="/{{  implode('/', array_slice($breadcrumbs, 0, $i+1)) }}">{{ $crumb }}</a></li>
    @endforeach
</ol>
