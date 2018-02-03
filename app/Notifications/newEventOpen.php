<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newEventOpen extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $event;
    public function __construct($ee)
    {
        //
        $this->event=$ee;
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
        $url='http://volleyball.ng/event/'.$this->event->slug;
        return (new MailMessage)
            ->subject('New Event opening')
                    ->line('Hi, Team test , a new event title: <b>'.$this->event->title.'</b>, is now open for registration' )
            ->line('Please click the button below to register your team')
                    ->action('Notification Action', $url)
                    ->line('Pleas ignore this email if you don\'t to register for this event')
                    ->line('<p>Best regards,<br><b>'.$this->event->organizer[0]->organizer.'</b></p>');

    }
    //save database notification

    public function toDatabase($notifiable)
    {
        //$url=route()
        return [
            //
            'message' => 'A event opening.',
            'action' =>'have a look'
        ];
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
        ];
    }
}
