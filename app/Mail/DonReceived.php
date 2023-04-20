<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        //
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('social@affranchie.com')  // l'expediteur
                    ->subject("Donation")    
                    ->markdown('emails.messages.DonReceived');
    }
}
