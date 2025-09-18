<?php

namespace App\Filament\Resources\Lieus;

use App\Filament\Resources\Lieus\Pages\CreateLieu;
use App\Filament\Resources\Lieus\Pages\EditLieu;
use App\Filament\Resources\Lieus\Pages\ListLieus;
use App\Filament\Resources\Lieus\Pages\ViewLieu;
use App\Filament\Resources\Lieus\Schemas\LieuForm;
use App\Filament\Resources\Lieus\Schemas\LieuInfolist;
use App\Filament\Resources\Lieus\Tables\LieusTable;
use App\Models\Lieu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;




class LieuResource extends Resource
{
    protected static ?string $model = Lieu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Schema $schema): Schema
    {
        // return LieuForm::configure($schema);
        return $schema
        ->schema([
            TextInput::make('nom')->required(),
            TextInput::make('description')->required(),
            FileUpload::make('images')
                ->disk('public')
                ->directory('lieux')
                ->visibility('public')
                ->required(),

            Select::make('ville_id')
                ->label('Ville')
                ->relationship('ville', 'nom')
                ->searchable()
                ->required(),

            Select::make('categorie_id')
                ->label('Catégorie')
                ->relationship('categorie', 'nom')
                ->required(),
        ]);
    }

    public static function infolist(Schema $infolist): Schema
    {
        return $infolist
            ->schema([
                TextEntry::make('nom')->label('Nom'),
                TextEntry::make('description')->label('Description'),
                ImageEntry::make('images')
                    ->label('Image')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->images))
                    ->height(200),

                TextEntry::make('ville.nom')->label('Ville'),
                TextEntry::make('categorie.nom')->label('Catégorie'),
                TextEntry::make('latitude')->label('Latitude'),
                TextEntry::make('longitude')->label('Longitude'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nom'),
            TextColumn::make('description'),
            ImageColumn::make('images')
                ->label('Image')
                ->circular()
                ->size(40)
                ->height(40)
                ->defaultImageUrl(asset('images/placeholder.png'))
                ->getStateUsing(fn ($record) => $record->images ? asset('storage/' . $record->images) : asset('images/placeholder.png')),
            TextColumn::make('latitude'),
            TextColumn::make('longitude'),
            TextColumn::make('categorie.nom'),
            TextColumn::make('ville.nom'),
        ])
        ->actions([
            ViewAction::make(),
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
            'index' => ListLieus::route('/'),
            'create' => CreateLieu::route('/create'),
            'view' => ViewLieu::route('/{record}'),
            'edit' => EditLieu::route('/{record}/edit'),
        ];
    }
}
