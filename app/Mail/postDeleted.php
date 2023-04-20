<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class postDeleted extends Mailable
{
    use Queueable, SerializesModels;
    public $texte;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($texte)
    {
        //
        $this->texte = $texte;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@affranchie.com')  // l'expediteur
                    ->subject("Suppression de post")    
                    ->markdown('emails.messages.postDeleted');
        
    }
}
