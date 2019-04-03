<?php

namespace Taggers\Century;

use Illuminate\Support\ServiceProvider;

class CenturyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Century', function () {
            return new Century;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
