<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Venue;
use App\Models\Tournament;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [


            Stat::make('New Users', User::where('created_at', '>=', now()->subMonth())->count())
                ->description('Users registered this month')
                ->descriptionicon('heroicon-s-user-group')
                ->color('primary')
                ->chart([1, 3, 5, 10, 20, 40]),

            Stat::make(
                'Tournaments',
                Tournament::count()
            )->description('Total number of tournaments')
                ->descriptionIcon('heroicon-o-tag')
                ->color('success')
                ->chart([10, 20, 30, 10, 20, 40]),

            Stat::make(
                'Venues',
                Venue::count()
            )
                ->description('Total number of venues')->descriptionIcon('heroicon-o-map-pin')->color('warning')
                ->chart([20, 18, 15, 10, 20, 40]),
        ];
    }
}
