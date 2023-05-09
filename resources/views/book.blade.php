<html>
<head>
    @livewireStyles
</head>
<body>
<ul>
    @foreach($pages as $page)
        <li><a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $page->slug }}">{{ $page->title }}</a></li>
    @endforeach
</ul>
@livewireScripts
</body>
</html>
