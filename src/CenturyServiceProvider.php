<?php

namespace Taggers\Century;

use Illuminate\Support\ServiceProvider;

class CenturyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->publishes([
            __DIR__.'/../migrations' => database_path('migrations'),
        ], 'century-migrations');

        $this->publishes([
            __DIR__.'/../assets/compiled' => public_path('vendor/century'),
        ], 'century-public');
    }
}
