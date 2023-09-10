<?php

namespace App\Providers;

use App\Models\Chirp;
use App\Observers\ChirpObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ChirpCreated;

use App\Listeners\SendChirpCreatedNotifications;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        ChirpCreated::class => [

            SendChirpCreatedNotifications::class,

        ],


        Registered::class => [
            SendEmailVerificationNotification::class,
        ],


    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Chirp::observe(ChirpObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
