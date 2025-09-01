<?php

namespace App\Filament\Pages;
use App\Filament\Widgets\DashboardWidget;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends \Filament\Pages\Dashboard
{
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

}