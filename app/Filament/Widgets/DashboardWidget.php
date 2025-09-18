<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DashboardWidget extends ChartWidget
{
    protected ?string $heading = 'Visites du site';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Visites',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 73, 65, 45, 55, 17],
                    'backgroundColor' => 'rgba(251, 191, 36, 0.2)',
                    'borderColor' => 'rgb(251, 191, 36)',
                ],
            ],
            'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

