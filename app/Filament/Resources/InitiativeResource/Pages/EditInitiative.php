<?php

namespace App\Filament\Resources\InitiativeResource\Pages;

use App\Filament\Resources\InitiativeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInitiative extends EditRecord
{
    protected static string $resource = InitiativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('toggleActive')
                ->label(fn ($record) => $record->is_active ? 'Deactivate' : 'Activate')
                ->icon(fn ($record) => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->color(fn ($record) => $record->is_active ? 'danger' : 'success')
                ->action(function ($record) {
                    $record->update(['is_active' => !$record->is_active]);
                    $this->notify('success', $record->is_active ? 'Initiative activated' : 'Initiative deactivated');
                }),
        ];
    }
}