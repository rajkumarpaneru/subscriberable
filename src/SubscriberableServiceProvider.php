<?php

namespace Raajkumarpaneru\Subscriberable;

use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\Subscriberable\Console\InstallSubscriberable;

class SubscriberableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'subscriberable');
    }

    public function boot()
    {
          if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSubscriberable::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('subscriberable.php'),
        ], 'config');


            // Export the migration
            if (! class_exists('CreateSubscribersTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_subscribers_table.php.stub' 
                    => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_subscribers_table.php'),
                    //another migration here
                ], 'migrations');
            }
    }
}
