<?php

namespace App\Filament\Widgets;

use App\Models\AbuseReport;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Reports', AbuseReport::count())
                ->description('All submitted reports')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
                
            Stat::make('Pending Reports', AbuseReport::where('status', 'pending')->count())
                ->description('Awaiting review')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Resolved Reports', AbuseReport::where('status', 'resolved')->count())
                ->description('Successfully addressed')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
                
            Stat::make('Registered Users', User::count())
                ->description('Total user accounts')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}