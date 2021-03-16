<?php

namespace App\Notifications;

use App\Notifications\Channel\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kavenegar\Laravel\Message\KavenegarMessage;
use Kavenegar\Laravel\Notification\KavenegarBaseNotification;

class Payment extends KavenegarBaseNotification
{
    use Queueable;

    public $phone_number;

    /**
     * Create a new notification instance.
     *
     * @param $phone_number
     */
    public function __construct($phone_number)
    {
        $this->phone_number =$phone_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return KavenegarMessage
     */
//    public function via($notifiable)
//    {
//        return [GhasedakChannel::class];
//    }
    public function toKavenegar($notifiable)
    {
        return (new KavenegarMessage("به وبسایت ما خوش آمدید"))->from('10004346');
    }

//    public function toGhasedakSms($notifiable)
//    {
//        return [
//            'text'=>"به وبسایت ما خوش آمدید",
//            'number'=>$this->phone_number,
//        ];
//
//    }

}
