<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Temoignage;
use App\Models\User;

class TemoignageDeleted extends Notification
{
    use Queueable;
    protected $temoignage;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Temoignage $temoignage, User $user )
    {
        //
        $this->temoignage = $temoignage;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
            'message' => "Votre temoignage a été supprimé par un moderateur",
            'info' =>"Vous avez une nouvelle notification",
            'user_id' =>$this->user->id,
        ];
    }
}
