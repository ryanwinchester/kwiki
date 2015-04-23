
@if (count($subcategories))
    <h3>Subcategories</h3>
    <ol>
        @foreach ($subcategories as $subcategory)
            <li><a href="{{ $subcategory['href'] }}">{{ $subcategory['name'] }}</a></li>
        @endforeach
    </ol>
@endif

@if (count($files))
    <h3>Files</h3>
    <ol>
        @foreach ($files as $file)
            <li><a href="{{ $file['href'] }}">{{ $file['name'] }}</a></li>
        @endforeach
    </ol>
@endif