<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\TextInput;
use App\Models\Reservations;
use BackedEnum;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;


// class ReservationsRessource extends Resource
// {
//     protected static ?string $model = Reservations::class;

//     protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//     protected static ?string $recordTitleAttribute = 'Reservation';

//     public static function form(Schema $scheme): Schema
//     {
//         return $schema
//             ->schema([
//                 TextInput::make('user_id')->required(),
//                 TextInput::make('date')->required(),
//                 TextInput::make('heure')->required(),
//                 TextInput::make('personnes')->required(),
//                 TextInput::make('transport')->required(),
//                 TextColumn::make('statut')->label('Statut')
//                     ->badge()
//                     ->color(fn($state) => $state === 'accepté' ? 'success' : ($state === 'en attente' ? 'warning' : 'secondary')),
//             ]);
//     }

//     public static function infolist(Schema $infolist): Schema
//     {
//         return $infolist
//             ->schema([  
//                 TextEntry::make('user_id')->label('Touriste'),
//                 TextEntry::make('date')->label('Date'),
//                 TextEntry::make('heure')->label('Heure'),
//                 TextEntry::make('personnes')->label('Personnes'),
//                 TextEntry::make('transport')->label('Transport'),
//                 TextEntry::make('statut')->label('Statut'),
//             ]);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns((
//                 TextColums::make('user_id')->label('Touriste'),
//                 TextColums::make('date')->label('Date'),
//                 TextColums::make('heure')->label('Heure'),
//                 TextColums::make('personnes')->label('Personnes'),
//                 TextColums::make('transport')->label('Transport'),
//                 TextColums::make('statut')->label('Statut')
//                     ->badge()
//                     ->color()
//             ))
//             ->actions([
//                 ViewAction::make(),
//                 EditAction::make(),
//                 DeleteAction::make(),
//             ]);
//     }
// }
