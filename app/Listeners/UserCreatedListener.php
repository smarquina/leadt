<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        Mail::to($event->getUser()->getEmail())
            ->queue(new UserCreatedMail($event->getUser()));
    }
}
