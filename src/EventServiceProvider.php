<?php

namespace Nikservik\LaravelJwtAuth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Nikservik\LaravelJwtAuth\SendVerificationEmail;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendVerificationEmail::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
