<?php

namespace Raajkumarpaneru\Subscriberable\Tests;

use CreateSubscriptionTypesTable;
use Raajkumarpaneru\Subscriberable\SubscriberableServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            SubscriberableServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/create_subscription_types_table.php';

        // run the up() method of that migration class
        (new CreateSubscriptionTypesTable())->up();

    }
}
