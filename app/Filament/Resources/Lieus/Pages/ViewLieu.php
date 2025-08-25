<?php

namespace App\Filament\Resources\Lieus\Pages;

use App\Filament\Resources\Lieus\LieuResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLieu extends ViewRecord
{
    protected static string $resource = LieuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
