<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource\RelationManagers;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->description('Enter the team member\'s personal information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter job title/position')
                            ->columnSpan(1),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->placeholder('Brief description of the team member\'s role and experience')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Forms\Components\Section::make('Profile Image')
                    ->description('Upload a professional photo of the team member')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->directory('team-members')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Social Media Links')
                    ->description('Add social media profiles (optional)')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook Profile URL')
                            ->url()
                            ->prefix('https://')
                            ->maxLength(255)
                            ->placeholder('facebook.com/username')
                            ->default(null),
                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter/X Profile URL')
                            ->url()
                            ->prefix('https://')
                            ->maxLength(255)
                            ->placeholder('twitter.com/username')
                            ->default(null),
                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn Profile URL')
                            ->url()
                            ->prefix('https://')
                            ->maxLength(255)
                            ->placeholder('linkedin.com/in/username')
                            ->default(null),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
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
                //
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}

