<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;

class InstallPackageTest extends TestCase
{
    /** @test */
    function the_install_command_copies_the_configuration()
    {
        if (File::exists(config_path('subscriberable.php'))) {
            unlink(config_path('subscriberable.php'));
        }

        $this->assertFalse(File::exists(config_path('subscriberable.php')));

        Artisan::call('subscriberable:install');

        $this->assertTrue(File::exists(config_path('subscriberable.php')));
    }
}
