<?php

namespace App\Filament\Resources\NewsletterSubscriberResource\Pages;

use App\Filament\Resources\NewsletterSubscriberResource;
use App\Imports\NewsletterSubscriberImporter;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables;
use Illuminate\Support\Collection;
use Filament\Forms;

class ListNewsletterSubscribers extends ListRecords
{
    protected static string $resource = NewsletterSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ImportAction::make()
                ->importer(NewsletterSubscriberImporter::class)
                ->label('Import Subscribers'),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('export')
                    ->label('Export Selected')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Collection $records) {
                        return response()->streamDownload(function () use ($records) {
                            echo "Name,Email,Status\n";
                            foreach ($records as $record) {
                                echo "{$record->name},{$record->email},{$record->status}\n";
                            }
                        }, 'newsletter-subscribers.csv');
                    })
            ]),
        ];
    }
}