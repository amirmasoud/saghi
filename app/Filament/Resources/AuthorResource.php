<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Filament\Resources\AuthorResource\RelationManagers;
use App\Models\Author;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('bio')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('nickname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('birth_year_in_hijri'),
                Forms\Components\Toggle::make('birth_year_in_hijri_validated')
                    ->required(),
                Forms\Components\TextInput::make('death_year_in_hijri'),
                Forms\Components\Toggle::make('death_year_in_hijri_validated')
                    ->required(),
                Forms\Components\TextInput::make('birth_place')
                    ->maxLength(255),
                Forms\Components\TextInput::make('birth_place_position_lat'),
                Forms\Components\TextInput::make('birth_place_position_lng'),
                Forms\Components\TextInput::make('death_place')
                    ->maxLength(255),
                Forms\Components\TextInput::make('death_place_position_lat'),
                Forms\Components\TextInput::make('death_place_position_lng'),
                Forms\Components\TextInput::make('order')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('bio'),
                Tables\Columns\TextColumn::make('nickname'),
                Tables\Columns\TextColumn::make('birth_year_in_hijri'),
                Tables\Columns\IconColumn::make('birth_year_in_hijri_validated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('death_year_in_hijri'),
                Tables\Columns\IconColumn::make('death_year_in_hijri_validated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('birth_place'),
                Tables\Columns\TextColumn::make('birth_place_position_lat'),
                Tables\Columns\TextColumn::make('birth_place_position_lng'),
                Tables\Columns\TextColumn::make('death_place'),
                Tables\Columns\TextColumn::make('death_place_position_lat'),
                Tables\Columns\TextColumn::make('death_place_position_lng'),
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'view' => Pages\ViewAuthor::route('/{record}'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
