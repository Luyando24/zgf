<?php

namespace App\Filament\Widgets;

use App\Models\AbuseReport;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReportsChart extends ChartWidget
{
    protected static ?string $heading = 'Reports Over Time';
    
    protected function getData(): array
    {
        $data = AbuseReport::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Reports',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => '#4a6baf',
                    'borderColor' => '#4a6baf',
                ],
            ],
            'labels' => $data->pluck('month')->toArray(),
        ];
    }
    
    protected function getType(): string
    {
        return 'line';
    }
}