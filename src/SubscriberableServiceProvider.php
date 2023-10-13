<?php

namespace Raajkumarpaneru\Subscriberable;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\Subscriberable\Console\InstallSubscriberable;

class SubscriberableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'subscriberable');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSubscriberable::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('subscriberable.php'),
        ], 'config');


        // Export the migration
        if (!class_exists('CreateSubscribersTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_subscribers_table.php.stub'
                => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_subscribers_table.php'),
                //another migration here
            ], 'migrations');
        }

        if (!class_exists('CreateSubscriptionTypesTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/2023_08_23_101326_create_subscription_types_table.php'
                => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_subscription_types_table.php'),
            ], 'migrations');
        }
        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('subscriberable.prefix'),
            'middleware' => config('subscriberable.api-middleware'),
        ];
    }
}
