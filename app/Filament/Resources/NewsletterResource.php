<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterResource\Pages;
use App\Models\Newsletter;
use App\Models\NewsletterSubscriber;
use App\Services\NewsletterService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?string $navigationLabel = 'Newsletters';

    // Remove the getNavigationItems() method as it's causing the error

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending_approval')->count();
    }

    // Instead, let's create a new navigation group for pending approvals
    public static function getNavigationItems(): array
    {
        return [
            \Filament\Navigation\NavigationItem::make('Newsletters')
                ->icon('heroicon-o-envelope')
                ->group('Marketing')
                ->url(static::getUrl()),
            \Filament\Navigation\NavigationItem::make('Pending Approval')
                ->icon('heroicon-o-clock')
                ->group('Marketing')
                ->badge(static::getModel()::where('status', 'pending_approval')->count())
                ->url(static::getUrl('pending'))
                ->sort(2),
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('newsletter-images')
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending_approval' => 'Pending Approval',
                        'approved' => 'Approved',
                        'sent' => 'Sent'
                    ])
                    ->default('draft')
                    ->disabled(fn ($record) => $record && $record->status === 'sent')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'pending_approval' => 'warning',
                        'approved' => 'success',
                        'sent' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Created By'),
                Tables\Columns\TextColumn::make('sent_count')
                    ->label('Sent'),
                Tables\Columns\TextColumn::make('failed_count')
                    ->label('Failed'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('send')
                    ->action(function (Newsletter $record, NewsletterService $newsletterService) {
                        if ($record->status !== 'approved') {
                            return;
                        }

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
                    })
                    ->requiresConfirmation()
                    ->visible(fn (Newsletter $record) => $record->status === 'approved')
                    ->color('success')
                    ->icon('heroicon-o-paper-airplane'),
                Tables\Actions\Action::make('approve')
                    ->action(fn (Newsletter $record) => $record->update([
                        'status' => 'approved',
                        'approved_at' => now(),
                        'approved_by' => auth()->id()
                    ]))
                    ->requiresConfirmation()
                    ->visible(fn (Newsletter $record) => $record->status === 'pending_approval')
                    ->color('warning')
                    ->icon('heroicon-o-check'),
                Tables\Actions\EditAction::make()
                    ->visible(fn (Newsletter $record) => $record->status !== 'sent'),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (Newsletter $record) => $record->status === 'draft'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
            'pending' => Pages\PendingNewsletters::route('/pending'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        
        return $data;
    }
}
