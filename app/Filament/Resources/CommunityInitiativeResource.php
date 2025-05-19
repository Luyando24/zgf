<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityInitiativeResource\Pages;
use App\Filament\Resources\CommunityInitiativeResource\RelationManagers;
use App\Models\CommunityInitiative;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Initiative;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CommunityInitiativeResource extends Resource
{
    protected static ?string $model = CommunityInitiative::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Community';
    protected static ?string $navigationLabel = 'Initiatives';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->description('Enter the core details of the initiative')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->placeholder('e.g. Support the boy child')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\Hidden::make('slug')
                            ->required()
                            ->unique(CommunityInitiative::class, 'slug', fn ($record) => $record)
                            ->helperText('URL-friendly version of the title. Auto-generated but can be edited.'),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Education' => 'Education',
                                'Health' => 'Health',
                                'Economic Empowerment' => 'Economic Empowerment',
                                'Environmental Conservation' => 'Environmental Conservation',
                                'Social Justice' => 'Social Justice',
                                'Cultural Preservation' => 'Cultural Preservation',
                                'Community Development' => 'Community Development',
                                'Youth Empowerment' => 'Youth Empowerment',
                                'Women Empowerment' => 'Women Empowerment',
                                'Humanitarian Aid' => 'Humanitarian Aid',
                                'Other' => 'Other',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('created_by')
                            ->label('Created By')
                            ->placeholder('Person or Organization in charge of this initiative')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Initiative Details')
                    ->description('Provide comprehensive information about the initiative')
                    ->schema([
                        Forms\Components\Textarea::make('summary')
                            ->placeholder('e.g. We are looking for volunteers to support the boy child')
                            ->required()
                            ->rows(3),
                        Forms\Components\RichEditor::make('description')
                            ->placeholder('Type the full initiative description here...')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('community-initiatives/attachments'),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('Media')
                    ->description('Upload images and add video links')
                    ->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->image()
                            ->directory('community-initiatives')
                            ->imagePreviewHeight(150)
                            ->maxSize(5024)
                            ->required(),
                        Forms\Components\TextInput::make('video_url')
                            ->placeholder('https://www.youtube.com/watch?v=')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Location & Timing')
                    ->description('Specify where and when the initiative takes place')
                    ->schema([
                        Forms\Components\TextInput::make('location')
                            ->placeholder('e.g. Lusaka')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->required(),
                                Forms\Components\DatePicker::make('end_date')
                                    ->required()
                                    ->after('start_date'),
                            ])
                            ->columns(2),
                    ]),

                Forms\Components\Section::make('Publication Status')
                    ->description('Control the visibility of this initiative')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('draft'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('cover_image')
                    ->square(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Education' => 'Education',
                        'Health' => 'Health',
                        'Economic Empowerment' => 'Economic Empowerment',
                        'Environmental Conservation' => 'Environmental Conservation',
                        'Social Justice' => 'Social Justice',
                        'Cultural Preservation' => 'Cultural Preservation',
                        'Community Development' => 'Community Development',
                        'Youth Empowerment' => 'Youth Empowerment',
                        'Women Empowerment' => 'Women Empowerment',
                        'Humanitarian Aid' => 'Humanitarian Aid',
                        'Other' => 'Other',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCommunityInitiatives::route('/'),
            'create' => Pages\CreateCommunityInitiative::route('/create'),
            'edit' => Pages\EditCommunityInitiative::route('/{record}/edit'),
        ];
    }
}
