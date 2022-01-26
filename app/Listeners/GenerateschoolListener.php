<?php

namespace App\Listeners;

use App\Events\GenerateschoolEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
