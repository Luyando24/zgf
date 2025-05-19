<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\PartnerRequest;

class PartnerRequestStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $partnerRequest;

    public function __construct(PartnerRequest $partnerRequest)
    {
        $this->partnerRequest = $partnerRequest;
    }

    public function build()
    {
        return $this->markdown('emails.partner-requests.status-updated')
            ->subject('Update on Your Partnership Request');
    }
}