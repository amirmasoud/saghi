<html>
<head>
    @livewireStyles
</head>
<body dir="rtl">
<span><a href="/">Home</a> / <a href="/{{ $author->slug }}">{{ $author->name }}</a></span>
<h1>{{ $author->name }}</h1>
<ul>
    @foreach($pages as $page)
        <li><a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $page->id }}">{{ $page->title }}</a></li>
    @endforeach
</ul>
<h2>Other books</h2>
@foreach($books as $book)
    <li><a href="/{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a></li>
@endforeach
@livewireScripts
</body>
</html>
