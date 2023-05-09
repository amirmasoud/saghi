<html>
    <head>
        @livewireStyles
    </head>
    <body>
        <ul>
            @foreach($authors as $author)
                <li><a href="{{ $author->slug }}">{{ $author->name }}</a></li>
            @endforeach
        </ul>
        @livewireScripts
    </body>
</html>
