<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbuseReportResource\Pages;
use App\Filament\Resources\AbuseReportResource\RelationManagers;
use App\Models\AbuseReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbuseReportResource extends Resource
{
    protected static ?string $model = AbuseReport::class;

    // Update icon to something more relevant
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    
    // Add navigation group to organize resources
    protected static ?string $navigationGroup = 'Reporting';
    
    // Set navigation sort order
    protected static ?int $navigationSort = 10;
    
    // Customize label
    protected static ?string $modelLabel = 'Abuse Report';
    protected static ?string $pluralModelLabel = 'Abuse Reports';
    
    // Add a navigation badge to show unprocessed reports
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }
    
    // Set badge color to indicate importance
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reference_number')
                    ->label('Reference Number')
                    ->disabled()
                    ->dehydrated(false)
                    ->visible(fn ($record) => $record !== null),
                Forms\Components\Section::make('Reporter Information')
                    ->description('Details of the person who submitted the report')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Toggle::make('is_anonymous')
                            ->label('Anonymous Report')
                            ->helperText('If enabled, the reporter chose to remain anonymous')
                            ->required(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Report Details')
                    ->description('Information about the reported issue')
                    ->schema([
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('report_type')
                            ->options([
                                'abuse' => 'Abuse (Physical, Emotional, Sexual)',
                                'discrimination' => 'Discrimination',
                                'corruption' => 'Corruption',
                                'human_rights_violation' => 'Human Rights Violation',
                                'environmental_issue' => 'Environmental Issue',
                                'other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('evidence_file')
                            ->directory('evidence-files')
                            ->visibility('private')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Processing Information')
                    ->description('Details about how this report was handled')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending Review',
                                'under_investigation' => 'Under Investigation',
                                'resolved' => 'Resolved',
                                'dismissed' => 'Dismissed',
                                'referred' => 'Referred to Authorities',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\Textarea::make('action_taken')
                            ->placeholder('Describe actions taken to address this report')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference_number')
                    ->label('Reference Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('report_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'abuse' => 'danger',
                        'discrimination' => 'warning',
                        'corruption' => 'orange',
                        'human_rights_violation' => 'danger',
                        'environmental_issue' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state)))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_anonymous')
                    ->boolean()
                    ->label('Anonymous'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'under_investigation' => 'warning',
                        'resolved' => 'success',
                        'dismissed' => 'danger',
                        'referred' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Submitted At'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending Review',
                        'under_investigation' => 'Under Investigation',
                        'resolved' => 'Resolved',
                        'dismissed' => 'Dismissed',
                        'referred' => 'Referred to Authorities',
                    ]),
                Tables\Filters\SelectFilter::make('report_type')
                    ->options([
                        'abuse' => 'Abuse',
                        'discrimination' => 'Discrimination',
                        'corruption' => 'Corruption',
                        'human_rights_violation' => 'Human Rights Violation',
                        'environmental_issue' => 'Environmental Issue',
                        'other' => 'Other',
                    ]),
                Tables\Filters\TernaryFilter::make('is_anonymous')
                    ->label('Anonymous Reports'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('markAsResolved')
                        ->label('Mark as Resolved')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Collection $records): void {
                            $records->each(function ($record): void {
                                $record->update(['status' => 'resolved']);
                            });
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbuseReports::route('/'),
            'create' => Pages\CreateAbuseReport::route('/create'),
            'view' => Pages\ViewAbuseReport::route('/{record}'),
            'edit' => Pages\EditAbuseReport::route('/{record}/edit'),
        ];
    }
    
    // Add tabs to filter the records
    public static function getRecordsTabs(): array
    {
        return [
            'all' => Tab::make('All Reports'),
            'pending' => Tab::make('Pending')
                ->icon('heroicon-o-clock')
                ->badge(AbuseReport::where('status', 'pending')->count())
                ->badgeColor('warning')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            'under_investigation' => Tab::make('Under Investigation')
                ->icon('heroicon-o-magnifying-glass')
                ->badge(AbuseReport::where('status', 'under_investigation')->count())
                ->badgeColor('info')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'under_investigation')),
            'resolved' => Tab::make('Resolved')
                ->icon('heroicon-o-check-circle')
                ->badge(AbuseReport::where('status', 'resolved')->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'resolved')),
        ];
    }
}
