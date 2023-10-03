<?php

namespace Raajkumarpaneru\Subscriberable\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallSubscriberable extends Command
{
    protected $signature = 'subscriberable:install';

    protected $description = 'Install the Subscriberable package';

    public function handle()
    {
        $this->info('Installing Subscriberable Package...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('subscriberable.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Subscriberable Package');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Raajkumarpaneru\Subscriberable\SubscriberableServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
