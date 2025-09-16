<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_propiedad, $nombre_propiedad, $usuario_id)
    {
        $this->id_propiedad = $id_propiedad;
        $this->nombre_propiedad = $nombre_propiedad;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {   

        $url = url('/notificaciones');
        return (new MailMessage)
            ->line('Has recibido un nuevo interesado en tu propiedad.')
            ->line('La propiedad es "' . $this->nombre_propiedad . '"')
            ->action('Ver Notificaciones', $url)
            ->line('Gracias por utilizar Propiedades!');
    }

    // Almacena las notificaciones en la DB
    public function toDatabase(object $notifiable)
    {
        return [
            'id_propiedad' => $this->id_propiedad,
            'nombre_propiedad' => $this->nombre_propiedad,
            'usuario_id' => $this->usuario_id,
        ];
    }
}
