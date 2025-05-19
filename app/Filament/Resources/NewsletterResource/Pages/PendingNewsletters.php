<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use App\Filament\Resources\NewsletterResource;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use App\Models\NewsletterSubscriber;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Services\NewsletterService;

class PendingNewsletters extends Page implements HasTable
{
    use InteractsWithTable;
    
    protected static string $resource = NewsletterResource::class;

    protected static string $view = 'filament.pages.newsletters.pending';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                static::getResource()::getModel()::query()
                    ->where('status', 'pending_approval')
            )
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->action(function ($record, NewsletterService $newsletterService) {
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => now(),
                            'approved_by' => auth()->id()
                        ]);

                        $subscribers = NewsletterSubscriber::where('status', 'active')->get();
                        $successCount = 0;
                        $failureCount = 0;

                        foreach ($subscribers as $subscriber) {
                            $success = $newsletterService->sendToSubscriber(
                                $subscriber,
                                $record->subject,
                                $record->content
                            );

                            if ($success) {
                                $successCount++;
                            } else {
                                $failureCount++;
                            }
                        }

                        $record->update([
                            'status' => 'sent',
                            'sent_at' => now(),
                            'sent_count' => $successCount,
                            'failed_count' => $failureCount,
                        ]);

                        Notification::make()
                            ->title('Newsletter sent successfully')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check'),
                Tables\Actions\ViewAction::make(),
            ]);
    }
}