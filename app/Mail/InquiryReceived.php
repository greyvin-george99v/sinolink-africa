<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    // This public property makes the data available to your blade template automatically
    public $emailData;

    /**
     * Create a new message instance.
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Vehicle Inquiry - Sinolink Africa',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // Use 'view' if your template is regular HTML/Blade 
            // or 'markdown' if you are using Laravel Mail components
            view: 'mail.inquiry-received', 
        );
    }

    public function attachments(): array
    {
        return [];
    }
}