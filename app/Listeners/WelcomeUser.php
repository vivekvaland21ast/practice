<?php

namespace App\Listeners;

use App\Events\Welcome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUser
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
    public function handle(Welcome $event): void
    {
        $userData = $event->userData;
        dd($userData);
    }
}
