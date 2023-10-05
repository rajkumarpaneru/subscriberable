<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

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

}
