<?php

namespace App\Filament\Widgets;

use App\Models\AbuseReport;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentReportsWidget extends BaseWidget
{
    protected static ?string $heading = 'Recent Reports';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                AbuseReport::latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('reference_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('report_type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                Tables\Columns\TextColumn::make('subject')
                    ->limit(30),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'under_investigation' => 'warning',
                        'resolved' => 'success',
                        'dismissed' => 'danger',
                        'referred' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (AbuseReport $record): string => route('filament.admin.resources.abuse-reports.view', $record)),
            ]);
    }
}