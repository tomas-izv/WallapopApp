<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class HardcodedNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        // No hace falta pasar datos para este ejemplo
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notificación de prueba')
            ->line('Esta es una notificación hardcodeada para probar el sistema.')
            ->action('Ver sitio', url('/'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Notificación hardcodeada: Esta es una notificación de prueba.',
            'url' => url('/')
        ];
    }
}