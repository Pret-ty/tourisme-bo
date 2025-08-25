<?php

namespace App\Filament\Resources\Lieus\Pages;

use App\Filament\Resources\Lieus\LieuResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLieu extends EditRecord
{
    protected static string $resource = LieuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
