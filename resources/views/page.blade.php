<html>
<head>
    @livewireStyles
</head>
<body>
<ul>
    <h1>{{ $content->title }}</h1>
    {!! $content->html_content !!}
    @if ($next?->slug)
    <p>Next > <a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $next->slug }}">{{ $next->title }}</a></p>
    @endif
    @if ($previous?->slug)
    <p>Previous < <a href="/{{ $author->slug }}/{{ $book->slug }}/{{ $previous->slug }}">{{ $previous->title }}</a></p>
    @endif
</ul>
@livewireScripts
</body>
</html>
