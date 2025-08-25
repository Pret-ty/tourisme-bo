<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\Pages\CreateCategorie;
use App\Filament\Resources\Categories\Pages\EditCategorie;
use App\Filament\Resources\Categories\Pages\ListCategories;
use App\Filament\Resources\Categories\Pages\ViewCategorie;
use App\Filament\Resources\Categories\Schemas\CategorieForm;
use App\Filament\Resources\Categories\Schemas\CategorieInfolist;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use App\Models\Categorie;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;



class CategorieResource extends Resource
{
    protected static ?string $model = Categorie::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Schema $schema): Schema
    {
        return $schema ->schema([
            TextInput::make('nom')->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CategorieInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nom'),
        ])
        ->filters([
        ])
        ->actions([
            EditAction::make(),
            DeleteAction::make(),
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
            'index' => ListCategories::route('/'),
            'create' => CreateCategorie::route('/create'),
            'view' => ViewCategorie::route('/{record}'),
            'edit' => EditCategorie::route('/{record}/edit'),
        ];
    }
}
