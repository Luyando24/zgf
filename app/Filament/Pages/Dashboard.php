<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardStatsOverview;
use App\Filament\Widgets\RecentReportsWidget;
use App\Filament\Widgets\ReportsChart;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getWidgets(): array
    {
        return [
            DashboardStatsOverview::class,
            ReportsChart::class,
            RecentReportsWidget::class,
        ];
    }
}



