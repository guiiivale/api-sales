<?php

namespace App\Mail;

use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SalesMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $sales;
    protected $seller;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller_id)
    {
        $this->seller = Seller::find($seller_id);
        $this->sales = Sale::where('created_at', '>=', now()->subDay())->where('seller_id', $seller_id)->sum('amount');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('guigato62@gmail.com', 'Tray exam'),
            subject: 'Daily Sales Info',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.sales',
            with: [
                'sales' => $this->sales,
                'seller' => $this->seller,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
