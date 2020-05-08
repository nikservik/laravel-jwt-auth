<?php

namespace Nikservik\LaravelJwtAuth;

use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Nikservik\LaravelJwtAuth\EventServiceProvider;
use Nikservik\LaravelJwtAuth\UserPolicy;

class LaravelJwtAuthServiceProvider extends AuthServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'laraveljwtauth');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'laraveljwtauth');
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->registerPolicies();
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/laravel-jwt-auth'),
        ], 'views');
        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/laravel-jwt-auth'),
        ], 'translations');
    }
}
