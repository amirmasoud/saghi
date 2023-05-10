<html>
<head>
    @livewireStyles
</head>
<body dir="rtl">
<ul>
    <span><a href="/">Home</a> / <a href="/{{ $author->slug }}">{{ $author->name }}</a> / <a href="/{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a> / {{ $content->title }}</span>
    <h1>{{ $content->title }}</h1>
    {!! $content->html_content !!}
    @if ($next?->id)
    <p>Next > <a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $next->id }}">{{ $next->title }}</a></p>
    @endif
    @if ($previous?->id)
    <p>Previous < <a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $previous->id }}">{{ $previous->title }}</a></p>
    @endif
    <h2>Contents</h2>
    @foreach($pages as $page)
        <li><a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $page->id }}">{{ $page->title }}</a></li>
    @endforeach
    <h2>Other books</h2>
    @foreach($books as $book)
        <li><a href="/{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a></li>
    @endforeach
</ul>
@livewireScripts
</body>
</html>
