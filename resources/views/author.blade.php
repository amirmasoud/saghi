<html>
<head>
    @livewireStyles
</head>
<body>
<ul>
    @foreach($books as $book)
        <li><a href="{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a></li>
    @endforeach
</ul>
@livewireScripts
</body>
</html>
