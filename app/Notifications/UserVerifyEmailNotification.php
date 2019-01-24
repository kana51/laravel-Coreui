<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;

class UserVerifyEmailNotification extends VerifyEmailNotification
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Userメール確認'))
            ->line(Lang::getFromJson('クリックして認証してください.'))
            ->action(
                Lang::getFromJson('メール認証'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('もしこのメールに覚えが無い場合は破棄してください。'));
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'user.verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );
    }
}