
<ol class="breadcrumb">
    @foreach ($breadcrumb as $i => $crumb)
        <li><a href="/{{  implode('/', array_slice($breadcrumb, 0, $i+1)) }}">{{ $crumb }}</a></li>
    @endforeach
</ol>
