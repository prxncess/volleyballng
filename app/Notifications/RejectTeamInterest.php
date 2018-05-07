<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RejectTeamInterest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $team;
    public function __construct($t)
    {
        //
        $this->team=$t;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->error()
            ->subject('request Declined')
                    ->line('Dear team'.$this->team['name'])
                    ->line('sorry but you can\'t register fot this event unless you do the following')
                    ->line('<ul><li>at least 6 players</li><li>1 staff member</li><li>a photo of the entire team</li></ul>.')
                    ->line('Then request for a team approval by login')
                    ->action('Here', route('teamSignIn'))
            ->line('If you have met all the requirements and still haven\'t gotten approved, please email <b><a href="mailto:eorijesu@gmail.com?subject=Enquiry or issue with volleyball team account" style="color: #4449ca; text-decoration: none">eorijesu@gmail.com</a></b>')
                    ->line('<p>Best regards,<br><b>Volleyball.ng</b></p>');
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
            'message'=>'Sorry request was declined as your team is not yet approved. An email was sent to you for further details.',
            'action'=>route('teamDashboard')
        ];
    }
}
