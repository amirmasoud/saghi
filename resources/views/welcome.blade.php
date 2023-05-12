@extends('app')

@section('content')
<div class="grid grid-cols-2 gap-y-12 gap-x-8 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 xl:gap-x-8">
    @foreach($authors as $author)
        <a href="/{{ $author->slug }}" class="group">
            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gradient-to-b from-gray-700 to-gray-900">
                <img src="https://picsum.photos/1280/1280?random={{ $loop->index }}" class="h-full w-full object-cover object-center group-hover:opacity-80">
            </div>
            <p class="mt-2 text-lg font-semibold text-gray-900">{{ $author->name }}</p>
        </a>
    @endforeach
</div>
@endsection
