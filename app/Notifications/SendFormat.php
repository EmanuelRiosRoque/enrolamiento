<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendFormat extends Notification
{
    use Queueable;

    public $archAdjunto ;
    public $nombreEmpleado;
    /**
     * Create a new notification instance.
     */
    public function __construct($archAdjunto, $nombreEmpleado)
    {
        $this->archAdjunto = $archAdjunto;
        $this->nombreEmpleado = $nombreEmpleado;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Formato Empleado')
            ->greeting('Hola ' . $this->nombreEmpleado)
            ->line('Recibiste este correo electrónico porque se generó un nuevo formato de empleado.')
            // Adjuntar el archivo al correo electrónico
            ->attach($this->archAdjunto, [
                'as' => 'documento.pdf',
                'mime' => 'application/pdf',
            ])
            ->line('Si no solicitaste un formato nuevo, puedes ignorar este correo.')
            ->salutation('Gracias, [TSJ]');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
