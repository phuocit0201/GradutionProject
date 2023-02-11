<?php

namespace App\Notifications;

use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PharIo\Manifest\Url;

class VerifyUser extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $token = Str::random(64);
        $time = \Illuminate\Support\Facades\Config::get('auth.verification.expire.resend', 60);
        UserVerify::updateOrCreate(
            ['user_id' => Auth::guard('admin')->user()->id],
            [
                'token' => $token,
                'expires_at' => Carbon::now()->addMinutes($time),
            ]
        );
        $verifyUrl = env('APP_URL')
            . '/admin/account/verify/'
            . $notifiable->getKey()
            . '?token=' . $token;
        return (new MailMessage)
                    ->subject('[FLATSHOP] XÁC NHẬN TÀI KHOẢN')
                    ->line('--------------------------------')
                    ->line('Xin chào ' . $notifiable->name . ', chào mừng bạn đã đến với FLATSHOP')
                    ->line('--------------------------------')
                    ->line('Để xác nhận tài khoản vui lòng bấm vào nút xác nhận dưới đây')
                    ->action('Xác Nhận', $verifyUrl);
    }
}
