<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'محتوا';

    protected static ?string $label = 'کتاب';

    protected static ?string $pluralModelLabel = 'کتاب‌ها';

    protected static bool $hasTitleCaseModelLabel = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }

    /**
     * @return array
     */
    public static function getSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')->required(),
            SpatieMediaLibraryFileUpload::make('cover'),
            MarkdownEditor::make('description')->nullable()->columnSpanFull(),
            Select::make('users')
                ->required()
                ->multiple()
                // ->editOptionForm(UserResource::getSchema())
                ->createOptionForm(UserResource::getSchema())
                ->relationship('users', 'name')
                ->preload(),
            Select::make('categories')
                ->required()
                ->multiple()
                // ->editOptionForm(CategoryResource::getSchema())
                ->createOptionForm(CategoryResource::getSchema())
                ->relationship('categories', 'name')
                ->preload(),
            Select::make('tags')
                ->required()
                ->multiple()
                // ->editOptionForm(TagResource::getSchema())
                ->createOptionForm(TagResource::getSchema())
                ->relationship('tags', 'name')
                ->preload(),
        ];
    }
}
