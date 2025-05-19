<?php

namespace App\Filament\Resources\AbuseReportResource\Pages;

use App\Filament\Resources\AbuseReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Notifications\Notification;

class ViewAbuseReport extends ViewRecord
{
    protected static string $resource = AbuseReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('markAsResolved')
                ->label('Mark as Resolved')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function () {
                    $this->record->status = 'resolved';
                    $this->record->save();
                    
                    Notification::make()
                        ->title('Report marked as resolved')
                        ->success()
                        ->send();
                        
                    $this->redirect(AbuseReportResource::getUrl('view', ['record' => $this->record]));
                })
                ->visible(fn () => $this->record->status !== 'resolved'),
            Actions\Action::make('markAsUnderInvestigation')
                ->label('Mark as Under Investigation')
                ->icon('heroicon-o-magnifying-glass')
                ->color('warning')
                ->action(function () {
                    $this->record->status = 'under_investigation';
                    $this->record->save();
                    
                    Notification::make()
                        ->title('Report marked as under investigation')
                        ->success()
                        ->send();
                        
                    $this->redirect(AbuseReportResource::getUrl('view', ['record' => $this->record]));
                })
                ->visible(fn () => $this->record->status !== 'under_investigation'),
            Actions\Action::make('markAsDismissed')
                ->label('Dismiss Report')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->status = 'dismissed';
                    $this->record->save();
                    
                    Notification::make()
                        ->title('Report dismissed')
                        ->success()
                        ->send();
                        
                    $this->redirect(AbuseReportResource::getUrl('view', ['record' => $this->record]));
                })
                ->visible(fn () => $this->record->status !== 'dismissed'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Report Information')
                    ->schema([
                        TextEntry::make('reference_number')
                            ->label('Reference Number')
                            ->weight('bold'),
                        TextEntry::make('report_type')
                            ->label('Report Type')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state)))
                            ->color(fn (string $state): string => match ($state) {
                                'abuse' => 'danger',
                                'discrimination' => 'warning',
                                'corruption' => 'orange',
                                'human_rights_violation' => 'danger',
                                'environmental_issue' => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state)))
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'gray',
                                'under_investigation' => 'warning',
                                'resolved' => 'success',
                                'dismissed' => 'danger',
                                'referred' => 'info',
                                default => 'gray',
                            }),
                        TextEntry::make('created_at')
                            ->label('Submitted At')
                            ->dateTime(),
                    ])
                    ->columns(2),
                
                Section::make('Report Details')
                    ->schema([
                        TextEntry::make('subject')
                            ->label('Subject')
                            ->weight('bold'),
                        TextEntry::make('location')
                            ->label('Location'),
                        TextEntry::make('description')
                            ->label('Description')
                            ->markdown()
                            ->columnSpanFull(),
                        ViewEntry::make('evidence_file')
                            ->label('Evidence File')
                            ->view('filament.infolists.components.file-attachment')
                            ->visible(fn ($record) => $record->evidence_file)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Section::make('Reporter Information')
                    ->schema([
                        IconEntry::make('is_anonymous')
                            ->label('Anonymous Report')
                            ->boolean(),
                        TextEntry::make('name')
                            ->label('Name')
                            ->visible(fn ($record) => !$record->is_anonymous && $record->name),
                        TextEntry::make('email')
                            ->label('Email')
                            ->visible(fn ($record) => !$record->is_anonymous && $record->email),
                        TextEntry::make('phone')
                            ->label('Phone')
                            ->visible(fn ($record) => !$record->is_anonymous && $record->phone),
                    ])
                    ->columns(2)
                    ->collapsed(),
                
                Section::make('Processing Information')
                    ->schema([
                        TextEntry::make('action_taken')
                            ->label('Action Taken')
                            ->markdown()
                            ->columnSpanFull(),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime(),
                    ])
                    ->collapsed(),

                Section::make('Tracking Information')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->copyable()
                            ->visible(fn ($record) => $record->ip_address),
                        TextEntry::make('user_location')
                            ->label('User Location')
                            ->visible(fn ($record) => $record->user_location),
                        TextEntry::make('created_at')
                            ->label('Submission Time')
                            ->dateTime(),
                    ])
                    ->columns(2)
                    ->collapsed()
                    ->collapsible(),
            ]);
    }
}

