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
                    ->line('Dear'.$this->team['name'])
                    ->line('To register for this event, please update your account with the following information')
                    ->line('<ul><li>add at least 6 players</li><li>1 staff member</li><li>a photo of the entire team</li></ul>.')
                    ->line('After that, please click the button at the bottom of your dashboard to request approval')
                    ->action('Login here to update your account', route('teamSignIn'))
            ->line('If you have met all the requirements and still do not have approval, please email <b><a href="mailto:hello@volleyball.ng?subject=Enquiry%20or%20issue%20with%20volleyball%20team%20account" style="color: #4449ca; text-decoration: none">hello@volleyball.ng</a></b>')
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
            'message'=>'Sorry, but this request was declined as your team is not yet approved. See your email for further details. If you do not receive an email after a few minutes, please check your spam/junk folder or email hello@volleyball.ng',
            'action'=>route('teamDashboard')
        ];
    }
}
