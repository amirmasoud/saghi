<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use App\Models\Comment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class CommentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Comments', Comment::count())
                ->icon('heroicon-o-chat-bubble-oval-left')
                ->url(route('filament.admin.resources.comments.index')),
        ];
    }
}
