<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body dir="rtl">
        @include('parts.header')
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl py-4">

            <div class="grid grid-cols-1 gap-y-12 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach($authors as $author)
                <a href="/{{ $author->slug }}" class="group">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gradient-to-b from-gray-700 to-gray-900 xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://picsum.photos/1280/1280?random={{ $loop->index }}" class="h-full w-full object-cover object-center group-hover:opacity-80">
                    </div>
                    <p class="mt-2 text-lg font-semibold text-gray-900">{{ $author->name }}</p>
                </a>
                @endforeach
            </div>

        </div>
        @livewireScripts
    </body>
</html>
