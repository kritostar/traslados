<?php 
use App\Notifications\WelcomeNotification;
use Illuminate\Notifications\Messages\MailMessage;

class MyCustomWelcomeNotification extends WelcomeNotification
{
    public function buildWelcomeNotificationMessage(): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to my app')
            ->action(Lang::get('Set initial password'), $this->showWelcomeFormUrl);
    }
}