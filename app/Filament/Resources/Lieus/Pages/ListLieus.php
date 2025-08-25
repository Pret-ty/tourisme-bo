<?php

namespace App\Filament\Resources\Lieus\Pages;

use App\Filament\Resources\Lieus\LieuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLieus extends ListRecords
{
    protected static string $resource = LieuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
