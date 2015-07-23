<?php

namespace Fungku\Kwiki\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Fungku\Kwiki\Events\SomeEvent' => [
            'Fungku\Kwiki\Listeners\EventListener',
        ],
    ];
}
