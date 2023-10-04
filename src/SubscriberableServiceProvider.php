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
    }
}
