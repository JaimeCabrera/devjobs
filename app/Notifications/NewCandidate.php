<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacant, $vacant_id)
    {
        $this->vacant = $vacant;
        $this->vacant_id = $vacant_id;
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
                    ->line('Has recibido un nuevo candidato en tu Vacante.')
                    ->line('la vacantes es'.$this->vacant)
                    ->action('Visita DevJobs', url('/'))
                    ->line('Gracias por utilizar DevJobs!');
    }

// notificaciones en la BD
    public function toDatabase($notifiable)
    {
        return [
            'vacant' => $this->vacant,
            'vacant_id' => $this->vacant_id
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
