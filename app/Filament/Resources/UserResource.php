<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form->schema(static::getSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')->required()->maxLength(120),
            Forms\Components\TextInput::make('email')->email()->required(),
            Forms\Components\TextInput::make('username')
                ->unique()
                ->required()
                ->prefix('@'),
            Forms\Components\Toggle::make('is_published')->default(false),
            Forms\Components\TextInput::make('password')->password()->revealable()->nullable(),
            SpatieMediaLibraryFileUpload::make('avatar'),
            Forms\Components\MarkdownEditor::make('bio')->nullable(),
            Forms\Components\DatePicker::make('email_verified_at')->nullable()->native(false),
            Forms\Components\DatePicker::make('published_at')->nullable()->native(false),
            Forms\Components\TextInput::make('birth_year_in_hijri')->minValue(0)->integer()->nullable(),
            Forms\Components\DatePicker::make('birth_year_validated_at')->nullable()->native(false),
            Forms\Components\TextInput::make('birth_place')->nullable(),
            Forms\Components\TextInput::make('birth_place_location')->nullable(),
            Forms\Components\TextInput::make('death_year_in_hijri')->minValue(0)->integer()->nullable(),
            Forms\Components\DatePicker::make('death_year_validated_at')->nullable()->native(false),
            Forms\Components\TextInput::make('death_place')->nullable(),
            Forms\Components\TextInput::make('death_place_location')->nullable(),
        ];
    }
}
