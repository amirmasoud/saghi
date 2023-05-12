@extends('app')

@section('content')
    <div class="md:flex md:items-center md:justify-between md:space-x-5 md:space-x-reverse">
        <div class="flex items-start space-x-5 space-x-reverse">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-lg" src="https://picsum.photos/1280/1280" alt="">
                    <span class="absolute inset-0 rounded-lg shadow-inner" aria-hidden="true"></span>
                </div>
            </div>
            <div class="pt-1.5">
                <h1 class="text-2xl font-bold text-gray-900">{{ $author->name }}</h1>
                <p class="text-sm font-medium text-gray-500">{{ $author->birth_year_in_hijri ?? 'نامعلوم' }} &mdash; {{ $author->death_year_in_hijri ?? 'نامعلوم' }}</p>
            </div>
        </div>
        <div class="justify-stretch mt-6 flex flex-col-reverse space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-start sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3 md:space-x-reverse">
            <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-100">دنبال کردن</button>
        </div>
    </div>

    <ul>
        @foreach($books as $book)
            <li><a href="{{ $author->slug }}/{{ $book->slug }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
@endsection
