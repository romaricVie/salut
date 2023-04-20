<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Topic;
use App\Models\User;

class CommentNotification extends Notification
{
    use Queueable;
    protected $topic;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Topic $topic, User $user)
    {
        //
         $this->topic = $topic;
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
            
            'topic_title' => $this->topic->title,
            'topic_id' =>$this->topic->id,
            'name' =>$this->user->name,
        ];
    }
}
