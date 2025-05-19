<?php

namespace App\Filament\Resources\PartnerRequestResource\Pages;

use App\Filament\Resources\PartnerRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\ViewEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Notifications\Notification;
use Filament\Forms;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerRequestStatusUpdated;

class ViewPartnerRequest extends ViewRecord
{
    protected static string $resource = PartnerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('updateStatus')
                ->label('Update Status')
                ->color('warning')
                ->icon('heroicon-o-pencil-square')
                ->form([
                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'pending' => 'Pending',
                            'reviewing' => 'Reviewing',
                            'accepted' => 'Accepted',
                            'rejected' => 'Rejected',
                        ])
                        ->default(fn () => $this->record->status)
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $oldStatus = $this->record->status;
                    
                    $this->record->update([
                        'status' => $data['status'],
                    ]);
                    
                    // Send email notification if status has changed
                    if ($oldStatus !== $data['status'] && $this->record->email) {
                        Mail::to($this->record->email)
                            ->send(new PartnerRequestStatusUpdated($this->record));
                    }
                    
                    Notification::make()
                        ->title('Status updated successfully')
                        ->success()
                        ->send();
                }),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Partner Request Details')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Full Name')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('organization')
                            ->label('Organization')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('email')
                            ->label('Email Address')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('phone')
                            ->label('Phone Number')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('partnership_type')
                            ->label('Partnership Type')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('status')
                            ->label('Status')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => ucfirst($state))
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'gray',
                                'reviewing' => 'warning',
                                'accepted' => 'success',
                                'rejected' => 'danger',
                                default => 'gray',
                            }),
                        TextEntry::make('message')
                            ->label('Message/Proposal')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull()
                            ->markdown(),
                        ViewEntry::make('document')
                            ->label('Attached Document')
                            // ViewEntry doesn't support size() and weight() methods
                            ->extraAttributes([
                                'class' => 'text-lg font-bold',
                            ])
                            ->columnSpanFull()
                            ->view('filament.infolists.components.document-viewer'),
                        TextEntry::make('created_at')
                            ->label('Submitted On')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}







