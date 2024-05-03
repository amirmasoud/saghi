<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
<<<<<<< HEAD
            ImportColumn::make('slug'),
=======
            // ImportColumn::make('slug'),
>>>>>>> a44feaf (wip)
            // ImportColumn::make('nickname'),
            // ImportColumn::make('username')
            //     ->requiredMapping()
            //     ->rules(['required']),
            // ImportColumn::make('is_published')
            //     ->rules(['date']),
            // ImportColumn::make('bio'),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email']),
            // ImportColumn::make('email_verified_at')
            //     ->rules(['email', 'date']),
            // ImportColumn::make('published_at')
            //     ->rules(['date']),
            // ImportColumn::make('birth_year_in_hijri')
            //     ->numeric()
            //     ->rules(['integer']),
            // ImportColumn::make('birth_year_validated_at')
            //     ->boolean()
            //     ->rules(['boolean']),
            // ImportColumn::make('birth_place'),
            // ImportColumn::make('birth_place_location'),
            // ImportColumn::make('death_year_in_hijri')
            //     ->numeric()
            //     ->rules(['integer']),
            // ImportColumn::make('death_year_validated_at')
            //     ->numeric()
            //     ->rules(['integer']),
            // ImportColumn::make('death_place'),
            // ImportColumn::make('death_place_location'),
            // ImportColumn::make('order_column'),
            ImportColumn::make('password')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?User
    {
        // return User::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new User();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your user import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
