<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;
class Contacts extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $firstname;
    public $email;
    public $phone;
    public $objet;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $firstname, $email, $phone, $objet, $message)
    {
        //
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phone = $phone;
        $this->objet = $objet;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email) // l'expediteur user
                    ->subject($this->objet) // objet  
                   ->markdown('emails.messages.contact');
    }
}
