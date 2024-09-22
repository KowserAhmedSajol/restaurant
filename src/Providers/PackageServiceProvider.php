<?php

namespace restaurant\restaurant\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'restaurant');

        $this->publishes([
            __DIR__ . '/../database/seeders' => database_path('seeders')

        ]);
        $this->publishes([
            __DIR__ . '/../database/factories' => database_path('factories')

        ]);
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }
}