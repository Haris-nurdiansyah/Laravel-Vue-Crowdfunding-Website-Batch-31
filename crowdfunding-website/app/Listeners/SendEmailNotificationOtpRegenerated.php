<?php

namespace App\Listeners;

use App\Events\RegenerateOtpCodeEvent;
use App\Notifications\RegenerateOtpCodeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendEmailNotificationOtpRegenerated implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegenerateOtpCodeEvent  $event
     * @return void
     */
    public function handle(RegenerateOtpCodeEvent $event)
    {
        Notification::send($event->user, new RegenerateOtpCodeNotification($event->user));
    }
}
