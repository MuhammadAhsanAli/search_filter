<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * Service provider to register application services.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * This method binds services into the service container as singletons,
     * ensuring that the same instance is used throughout the application.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap the application services.
     *
     * This method is called after all services are registered.
     * It can be used to perform tasks that should be done at the start
     * of the application, such as registering event listeners or
     * publishing configuration files.
     *
     * @return void
     */
    public function boot(): void
    {
        // No actions needed during bootstrapping in this example
    }
}
