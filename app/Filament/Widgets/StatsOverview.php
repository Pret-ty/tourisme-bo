<?php

namespace App\Filament\Widgets;

use App\Models\Guide;
use App\Models\Lieu;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Utilisateurs enregistrés', User::count())
                ->description('Nouveaux utilisateurs cette semaine : ' . User::where('created_at', '>=', now()->subWeek())->count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Lieux enregistrés', Lieu::count())
                ->description('Total des lieux touristiques')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('info'),
            Stat::make('Guides inscrits', Guide::count())
                ->description('Total des guides disponibles')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),
            ];
    }
}
