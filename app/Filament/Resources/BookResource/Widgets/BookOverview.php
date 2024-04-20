<?php

namespace App\Filament\Resources\BookResource\Widgets;

use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
                ->icon('heroicon-o-book-open')
                ->url(route('filament.admin.resources.books.index')),
        ];
    }
}
