<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Notifications\Notification;

class ManageSettings extends ManageRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Save Settings')
                ->color('primary')
                ->icon('heroicon-o-check')
                ->action(function () {
                    // Save settings logic here
                    Notification::make()
                        ->title('Settings saved successfully')
                        ->success()
                        ->send();
                }),
            Actions\Action::make('resetToDefault')
                ->label('Reset to Default')
                ->color('danger')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->action(function () {
                    // Reset settings logic here
                    Notification::make()
                        ->title('Settings have been reset to default values')
                        ->success()
                        ->send();
                }),
        ];
    }
}