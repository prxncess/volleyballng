<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EventInterest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $event;
    protected $team;
    public function __construct($ee,$tes)
    {
        //
        $this->event=$ee;
        $this->team=$tes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
                    ->line('Hello'.$this->event->organizer[0]->organizer .', Team '.$this->team['name'])
                    ->line(' has shown interest for '.$this->event->title.' event.')
                    ->action('Please login to manage this request', route('organizerLogin'))
                    ->line('Thank you');
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
    public function toDatabase($notifiable)
    {
        return [
            //
            'message'=>'Hello, team <b>'.$this->team['name'].'</b> has shown interest for '.$this->event->title.' event.',
            'action'=>route('OgCheckTeam',[$this->team['name'],$this->event->slug])
        ];
    }
}
