<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;
    use SortableTrait;
    use SoftDeletes;

    public $casts = [
        'published_at' => 'date',
        'content' => 'json',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('fa');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
