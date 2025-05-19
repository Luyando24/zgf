<?php

namespace App\Imports;

use App\Models\NewsletterSubscriber;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Filament\Actions\Imports\ImportColumn;

class NewsletterSubscriberImporter extends Importer
{
    protected static ?string $model = NewsletterSubscriber::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label('Name')
                ->requiredMapping()
                ->rules(['required', 'string']),
            ImportColumn::make('email')
                ->label('Email')
                ->requiredMapping()
                ->rules(['required', 'email']),
            ImportColumn::make('status')
                ->label('Status')
                ->rules(['nullable', 'string', 'in:active,inactive'])
                ->validationAttribute('status'),
        ];
    }

    public function resolveRecord(): ?NewsletterSubscriber
    {
        return NewsletterSubscriber::firstOrNew([
            'email' => $this->data['email'],
        ]);
    }

    public function mutateRecord(NewsletterSubscriber $record): NewsletterSubscriber
    {
        \Log::info('Importing subscriber', [
            'data' => $this->data,
            'record' => $record->toArray()
        ]);

        $record->fill([
            'name' => $this->data['name'],
            'status' => $this->data['status'] ?? 'active',
        ]);

        $record->save();

        \Log::info('Subscriber saved', [
            'record' => $record->fresh()->toArray()
        ]);

        return $record;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $count = number_format($import->successful_rows);
        return "Successfully imported {$count} newsletter subscribers.";
    }
}