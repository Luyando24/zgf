@component('mail::message')
# Partnership Request Status Update

Dear {{ $partnerRequest->name }},

Your partnership request has been reviewed and the status has been updated to: **{{ ucfirst($partnerRequest->status) }}**

@if($partnerRequest->status === 'accepted')
Congratulations! Your partnership request has been accepted. Our team will contact you shortly to discuss the next steps.
@elseif($partnerRequest->status === 'reviewing')
Your request is currently under review. We will notify you of any updates.
@elseif($partnerRequest->status === 'rejected')
We regret to inform you that we are unable to proceed with your partnership request at this time.
@endif

**Request Details:**
- Organization: {{ $partnerRequest->organization }}
- Partnership Type: {{ $partnerRequest->partnership_type }}
- Submitted On: {{ $partnerRequest->created_at->format('F j, Y') }}

If you have any questions, please don't hesitate to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent