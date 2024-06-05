<?php

namespace App\Providers;

use App\Events\Welcome;
use App\Listeners\WelcomeUser;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $listen = [
        Welcome::class => [
            WelcomeUser::class,
        ],
    ];
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
