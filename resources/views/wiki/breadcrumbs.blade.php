
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    @if (count($breadcrumbs))
        @foreach ($breadcrumbs as $crumb)
            <li><a href="{{  $crumb['href'] }}">{{ $crumb['name'] }}</a></li>
        @endforeach
    @endif
</ol>
