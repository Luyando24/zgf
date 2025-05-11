<?php

namespace App\Filament\Pages;

use App\Mail\NewsletterUpdate;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.send-newsletter';

    public $content;
    public $subject;


    public int $subscriberCount = 0;

    public function mount(): void
    {
        $this->subscriberCount = NewsletterSubscriber::count();
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('subject')
            ->label('Subject')
            ->required(), 
            
            RichEditor::make('content')
                ->label('Newsletter Content')
                ->columnSpanFull()
                ->required(),
        ];
    }

    public function send(): void
{
    $data = $this->form->getState();

    foreach (NewsletterSubscriber::all() as $subscriber) {
        Mail::to($subscriber->email)->queue(
            new NewsletterUpdate($data['subject'], $data['content'])
        );
    }

    Notification::make()
        ->title('Newsletter sent successfully!')
        ->success()
        ->send();

    $this->form->fill();
}

}
