<?php

namespace Raajkumarpaneru\Subscriberable;

use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\Subscriberable\Console\InstallSubscriberable;

class SubscriberableServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
          if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSubscriberable::class,
            ]);
        }
    }
}
