<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;
use Raajkumarpaneru\Subscriberable\Models\Subscription;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function subscription_can_be_created()
    {
        $subscription = Subscription::factory()->create();
        $this->assertInstanceOf(Subscription::class, $subscription);
        $this->assertDatabaseCount('subscriptions', 1);
//        $this->assertDatabaseHas('subscriptions', $subscription->toArray());
    }

    /** @test */
    public function subscription_can_be_read()
    {
        $subscription = Subscription::factory()->create();
        $this->assertInstanceOf(Subscription::class, $subscription);

        $found = Subscription::find($subscription->id);
        $this->assertEquals($found->id, $subscription->id);
    }

    /** @test */
    public function subscription_can_be_updated()
    {
        $subscription = Subscription::factory()->create();
        $this->assertInstanceOf(Subscription::class, $subscription);

        $updatedData = [
            'status' => 0,
            'payment_type' => 'Credit Card',
        ];

        $subscription->update($updatedData);
        $subscription->refresh();
        $this->assertEquals($subscription->payment_type, 'Credit Card');
        $this->assertEquals($subscription->status, 0);
        $this->assertDatabaseHas('subscriptions', $updatedData);
    }

    /** @test */
    public function subscription_can_be_deleted()
    {
        $subscription = Subscription::factory()->create();
        $this->assertInstanceOf(Subscription::class, $subscription);
        $subscription->delete();
        $this->assertDeleted($subscription);
    }
}
