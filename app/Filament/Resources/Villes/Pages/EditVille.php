<?php

namespace App\Filament\Resources\Villes\Pages;

use App\Filament\Resources\Villes\VilleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVille extends EditRecord
{
    protected static string $resource = VilleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
