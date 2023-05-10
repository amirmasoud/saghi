<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'authors' => \App\Models\Author::all(),
    ]);
});

Route::get('/{author:slug}', function (\App\Models\Author $author) {
    return view('author', [
        'author' => $author,
        'books' => $author->books,
    ]);
});

Route::get('/{author:slug}/{book:slug}', function (\App\Models\Author $author, \App\Models\Book $book) {
    return view('book', [
        'author' => $author,
        'book' => $book,
        'books' => $author->books,
        'pages' => $book->pages,
    ]);
});

Route::get('/{author:slug}/{book:slug}/{page:id}', function (\App\Models\Author $author, \App\Models\Book $book, \App\Models\Page $page) {
    return view('page', [
        'author' => $author,
        'book' => $book,
        'books' => $author->books,
        'pages' => $book->pages,
        'content' => $page,
        'next' => $book->pages()->where('id', '>', $page->id)->first(),
        'previous' => $book->pages()->where('id', '<', $page->id)->orderBy('order', 'desc')->first(),
    ]);
})->where('page', '(.*)');
