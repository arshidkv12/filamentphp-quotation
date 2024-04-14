<?php

namespace App\Mail;

use App\Models\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\QuotationItem;

class QuotationResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $quote_items = [];

    /**
     * Create a new message instance.
     */
    public function __construct(public Quotation $quote)
    {
        $this->quote_items = QuotationItem::where('quotation_id', $quote->id)->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Quotation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.quotation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [ storage_path( 'app/public/quote-'.$this->quote->id.'.pdf' )];
    }
}
