<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\SiteContent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shippingCost;
    public $books;
    public $sitecontent;
    public $orderNumber;
    public $deliveryDetails;
    public $totalPrice;

    /**
     * Create a new message instance.
     */
    public function __construct($shippingCost, $books, $orderNumber, $totalPrice, array $deliveryDetails)
    {
        $this->orderNumber = $orderNumber;
        $this->shippingCost = $shippingCost;
        $this->books = $books;
        $this->sitecontent = SiteContent::first();
        $this->deliveryDetails = $deliveryDetails;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('sells@wardbook.com'),
            replyTo: [
                new Address($this->sitecontent->email, 'WardBookStore Contact'),
            ],
            subject: 'Invoice Mail From WardBook Store'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
