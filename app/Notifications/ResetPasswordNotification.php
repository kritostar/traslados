<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject(__('Reestablezca su contrasena!'))
            ->line(__('Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.'))
            ->action(__('Restablecer la contraseña'), $url)
            ->line(__('Este enlace de restablecimiento de contraseña caducará en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(__('Si no solicitó un restablecimiento de contraseña, no se requiere ninguna otra acción.'));
    }
}