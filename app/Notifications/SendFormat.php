<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendFormat extends Notification
{
    use Queueable;

    public $urlImg;
    public $nombreEmpleado;
    /**
     * Create a new notification instance.
     */
    public function __construct($urlImg, $nombreEmpleado)
    {
        $this->urlImg = $urlImg;
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
            ->greeting('Hola ' . $this->nombreEmpleado) // Concatenar el nombre del empleado al saludo
            ->line('Recibiste este correo electrónico porque se generó un nuevo formato de empleado.')
            ->action('Ver Documento', url($this->urlImg))
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
