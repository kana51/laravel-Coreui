<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class UserPasswordResetNotification extends ResetPasswordNotification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('パスワード再発行リクエストがありましたので、メッセージを送信しました。')
            ->action('パスワード再設定', url(config('url').route('user.password.reset', $this->token, false)))
            ->line('もし心当たりがない場合は、本メッセージは破棄してください。');
    }
}