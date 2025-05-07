<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource\RelationManagers;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Careers';
    protected static ?string $navigationLabel = 'Careers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Job Title')
                    ->placeHolder('e.g Software Engineer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'Full-Time' => 'Full-Time',
                        'Part-Time' => 'Part-Time',
                        'Contract' => 'Contract',
                        'Internship' => 'Internship',
                        'Freelance' => 'Freelance',
                    ])
                    ->label('Job Type')
                    ->required()
                    ->default('Full-Time'),
                    Forms\Components\Select::make('category')
                    ->options([
                        'Engineering' => 'Engineering',
                        'Marketing' => 'Marketing',
                        'Sales' => 'Sales',
                        'HR' => 'HR',
                        'Finance' => 'Finance',
                        'IT' => 'IT',
                    ])
                    ->label('Job Category')
                    ->required(),
                    Forms\Components\TextInput::make('salary')
                    ->prefix('ZMW')
                    ->placeholder('e.g. 7000 - 15000')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('summary')
                    ->placeHolder('e.g. We are looking for a talented software engineer to join our team.')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->placeHolder('Type the full job description here...')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->placeHolder('e.g. Lusaka')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('application_deadline')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('application_deadline')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
