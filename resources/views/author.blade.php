<html>
<head>
    @livewireStyles
</head>
<body dir="rtl">
<span><a href="/">Home</a></span>
<h1>{{ $author->name }}</h1>
<ul>
    @foreach($books as $book)
        <li><a href="{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a></li>
    @endforeach
</ul>
@livewireScripts
</body>
</html>
