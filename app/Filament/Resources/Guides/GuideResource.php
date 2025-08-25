<?php

namespace App\Filament\Resources\Guides;

use App\Filament\Resources\Guides\Pages\CreateGuide;
use App\Filament\Resources\Guides\Pages\EditGuide;
use App\Filament\Resources\Guides\Pages\ListGuides;
use App\Filament\Resources\Guides\Pages\ViewGuide;
use App\Filament\Resources\Guides\Schemas\GuideForm;
use App\Filament\Resources\Guides\Schemas\GuideInfolist;
use App\Filament\Resources\Guides\Tables\GuidesTable;
use App\Models\Guide;
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
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;


class GuideResource extends Resource
{
    protected static ?string $model = Guide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Schema $schema): Schema
    {
        return $schema ->schema([
            TextInput::make('nom')->required(),
            TextInput::make('prenom')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('telephone')->tel(),
            FileUpload::make('preuve')
                ->disk('public')
                ->directory('guide-proof')
                ->visibility('public')
                ->required(),
        ]);
    }

    public static function infolist(Schema $infolist): Schema
    {
        return $infolist
            ->schema([
                TextEntry::make('nom')->label('Nom'),
                TextEntry::make('prenom')->label('Prénom'),
                TextEntry::make('email')->label('Email'),
                TextEntry::make('telephone')->label('Téléphone'),
                ImageEntry::make('preuve')
                    ->label('Carte du guide')
                    ->getStateUsing(fn ($record) => asset('storage/' .$record->preuve)),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nom'),
            TextColumn::make('prenom'),
            TextColumn::make('email'),
            TextColumn::make('telephone'),
            TextColumn::make('preuve')
                ->label('Preuve')
                ->url(fn ($record) => asset('storage/' . $record->images))
                ->openUrlInNewTab()
                ->formatStateUsing(fn ($state) => basename($state))
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
            'index' => ListGuides::route('/'),
            'create' => CreateGuide::route('/create'),
            'view' => ViewGuide::route('/{record}'),
            'edit' => EditGuide::route('/{record}/edit'),
        ];
    }
}
