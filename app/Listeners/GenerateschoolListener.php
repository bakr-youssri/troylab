<?php

namespace App\Listeners;

use App\Events\GenerateschoolEvent;
use App\Notifications\SchoolCreated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class GenerateschoolListener
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
     * @param  \App\Events\GenerateschoolEvent  $event
     * @return void
     */
    public function handle(GenerateschoolEvent $event)
    {
        Notification::route('mail', 'bakr.youssri@gmail.com')->notify(new SchoolCreated($event->number));
    }
}
