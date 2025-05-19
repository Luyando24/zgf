<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceResource\Pages;
use App\Filament\Resources\ResourceResource\RelationManagers;
use App\Models\Resource as ResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter resource title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (! $state) return;
                                $set('slug', Str::slug($state));
                            })
                            ->columnSpan(2),
                            
                        Forms\Components\Hidden::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'annual_report' => 'Annual Report',
                                'impact_report' => 'Impact Report',
                                'research_paper' => 'Research Paper'
                            ])
                            ->default('annual_report')
                            ->reactive(),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(1000)
                            ->rows(3)
                            ->placeholder('Enter resource description')
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Resource File')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->required()
                            ->label('Upload Resource File')
                            ->directory('resources')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->downloadable()
                            ->columnSpan(2),

                        Forms\Components\Select::make('icon')
                            ->options([
                                'bi bi-file-earmark-text' => 'Document',
                                'bi bi-graph-up' => 'Graph',
                                'bi bi-journal-text' => 'Journal',
                                'bi bi-file-pdf' => 'PDF',
                                'bi bi-file-richtext' => 'Rich Text'
                            ])
                            ->default('bi bi-file-earmark-text')
                            ->required()
                            ->searchable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Publishing Options')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Toggle to make this resource publicly available')
                            ->default(true),

                        Forms\Components\TextInput::make('download_count')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(false)
                            ->visible(fn ($record) => $record !== null),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),
                    
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'annual_report' => 'success',
                        'impact_report' => 'warning',
                        'research_paper' => 'info',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                    
                    
                Tables\Columns\TextColumn::make('download_count')
                    ->numeric()
                    ->sortable()
                    ->alignment('center')
                    ->badge()
                    ->color('success'),
                    
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'annual_report' => 'Annual Report',
                        'impact_report' => 'Impact Report',
                        'research_paper' => 'Research Paper',
                    ]),
                    
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publication Status')
                    ->trueLabel('Published')
                    ->falseLabel('Draft')
                    ->placeholder('All Resources'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('togglePublish')
                        ->label('Toggle Publication Status')
                        ->icon('heroicon-o-arrow-path')
                        ->action(function (Collection $records): void {
                            $records->each(function ($record) {
                                $record->update(['is_published' => !$record->is_published]);
                            });
                        })
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }
}
