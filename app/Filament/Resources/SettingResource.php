<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'Settings';
    
    protected static ?int $navigationSort = 10;
    
    // Make this a single page resource
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Site Name')
                                    ->required(),
                                Forms\Components\Textarea::make('site_description')
                                    ->label('Site Description'),
                                Forms\Components\FileUpload::make('site_logo')
                                    ->label('Site Logo')
                                    ->image()
                                    ->directory('site'),
                                Forms\Components\FileUpload::make('site_favicon')
                                    ->label('Site Favicon')
                                    ->image()
                                    ->directory('site'),
                                Forms\Components\ColorPicker::make('primary_color')
                                    ->label('Primary Color')
                                    ->default('#4a6baf'),
                                Forms\Components\ColorPicker::make('secondary_color')
                                    ->label('Secondary Color')
                                    ->default('#38bdf8'),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('Contact Information')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label('Contact Email')
                                    ->email(),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->label('Contact Phone')
                                    ->tel(),
                                Forms\Components\TextInput::make('address_line_1')
                                    ->label('Address Line 1'),
                                Forms\Components\TextInput::make('address_line_2')
                                    ->label('Address Line 2'),
                                Forms\Components\TextInput::make('city')
                                    ->label('City'),
                                Forms\Components\TextInput::make('state')
                                    ->label('State/Province'),
                                Forms\Components\TextInput::make('postal_code')
                                    ->label('Postal/Zip Code'),
                                Forms\Components\TextInput::make('country')
                                    ->label('Country'),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Forms\Components\TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->prefix('https://'),
                                Forms\Components\TextInput::make('twitter_url')
                                    ->label('Twitter URL')
                                    ->url()
                                    ->prefix('https://'),
                                Forms\Components\TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->prefix('https://'),
                                Forms\Components\TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL')
                                    ->url()
                                    ->prefix('https://'),
                                Forms\Components\TextInput::make('youtube_url')
                                    ->label('YouTube URL')
                                    ->url()
                                    ->prefix('https://'),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Default Meta Title')
                                    ->helperText('If empty, site name will be used'),
                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Default Meta Description')
                                    ->helperText('If empty, site description will be used'),
                                Forms\Components\FileUpload::make('og_image')
                                    ->label('Default Social Share Image')
                                    ->image()
                                    ->directory('site/seo'),
                                Forms\Components\TextInput::make('google_analytics_id')
                                    ->label('Google Analytics ID')
                                    ->placeholder('G-XXXXXXXXXX'),
                                Forms\Components\Textarea::make('header_scripts')
                                    ->label('Additional Header Scripts')
                                    ->helperText('Scripts to be included in the <head> section')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('footer_scripts')
                                    ->label('Additional Footer Scripts')
                                    ->helperText('Scripts to be included before the closing </body> tag')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('Reporting System')
                            ->icon('heroicon-o-exclamation-triangle')
                            ->schema([
                                Forms\Components\Toggle::make('enable_anonymous_reports')
                                    ->label('Enable Anonymous Reports')
                                    ->helperText('Allow users to submit reports without providing personal information')
                                    ->default(true),
                                Forms\Components\Toggle::make('require_evidence_file')
                                    ->label('Require Evidence Files')
                                    ->helperText('Make evidence file upload mandatory for all reports')
                                    ->default(false),
                                Forms\Components\TextInput::make('report_admin_email')
                                    ->label('Report Notification Email')
                                    ->email()
                                    ->helperText('Email address to receive notifications about new reports'),
                                Forms\Components\Select::make('default_report_status')
                                    ->label('Default Report Status')
                                    ->options([
                                        'pending' => 'Pending Review',
                                        'under_investigation' => 'Under Investigation',
                                    ])
                                    ->default('pending')
                                    ->required(),
                                Forms\Components\Textarea::make('report_submission_message')
                                    ->label('Report Submission Message')
                                    ->helperText('Message displayed to users after submitting a report')
                                    ->default('Thank you for your report. We take all reports seriously and will review your submission promptly.'),
                                Forms\Components\RichEditor::make('reporting_policy')
                                    ->label('Reporting Policy')
                                    ->helperText('Policy information displayed on the reporting form')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('Email Settings')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Forms\Components\TextInput::make('mail_from_address')
                                    ->label('From Email Address')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('mail_from_name')
                                    ->label('From Name')
                                    ->required(),
                                Forms\Components\Toggle::make('enable_email_notifications')
                                    ->label('Enable Email Notifications')
                                    ->default(true),
                                Forms\Components\Select::make('email_template')
                                    ->label('Email Template Style')
                                    ->options([
                                        'default' => 'Default',
                                        'minimal' => 'Minimal',
                                        'branded' => 'Branded',
                                    ])
                                    ->default('branded'),
                                Forms\Components\RichEditor::make('email_footer_text')
                                    ->label('Email Footer Text')
                                    ->helperText('Text to be included in the footer of all emails')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                            
                        Forms\Components\Tabs\Tab::make('Legal')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\RichEditor::make('privacy_policy')
                                    ->label('Privacy Policy')
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('terms_of_service')
                                    ->label('Terms of Service')
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('cookie_policy')
                                    ->label('Cookie Policy')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->limit(50),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
