<?php

namespace App\Filament\Resources\Villes;

use App\Filament\Resources\Villes\Pages\CreateVille;
use App\Filament\Resources\Villes\Pages\EditVille;
use App\Filament\Resources\Villes\Pages\ListVilles;
use App\Filament\Resources\Villes\Pages\ViewVille;
use App\Filament\Resources\Villes\Schemas\VilleForm;
use App\Filament\Resources\Villes\Schemas\VilleInfolist;
use App\Filament\Resources\Villes\Tables\VillesTable;
use App\Models\Ville;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;

class VilleResource extends Resource
{
    protected static ?string $model = Ville::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Schema $schema): Schema
    {
        return $schema ->schema([
            TextInput::make('nom')->required(),
            TextInput::make('description')->required()
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VilleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nom'),
            TextColumn::make('description'),
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
            'index' => ListVilles::route('/'),
            'create' => CreateVille::route('/create'),
            'view' => ViewVille::route('/{record}'),
            'edit' => EditVille::route('/{record}/edit'),
        ];
    }
}
