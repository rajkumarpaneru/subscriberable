<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\Subscriberable\Models\SubscriptionType;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;

class SubscriptionTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_subscription_type_can_be_created()
    {
        $subscription_type = SubscriptionType::create([
            'name' => 'monthly',
            'rank' => 1,
            'is_active' => 1
        ]);
        $this->assertEquals('monthly', $subscription_type->name);
    }

    /** @test */
    function a_subscription_name_is_unique()
    {
        $subscription_name = 'monthly';

        $existing_type = SubscriptionType::create([
            'name' => $subscription_name,
            'rank' => 1,
            'is_active' => 1
        ]);

        try {
            $new_type = SubscriptionType::create([
                'name' => $subscription_name,
                'rank' => 2,
                'is_active' => 0
            ]);

            // If no exception is thrown, fail the test
            $this->fail('Integrity constraint violation exception was not thrown.');
        } catch (QueryException $e) {
            $this->assertStringContainsString('Integrity constraint violation', $e->getMessage());
        }

        $this->assertDatabaseCount('subscription_types', 1);
    }

}
