<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;
use Raajkumarpaneru\Subscriberable\Models\Subscription;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_new_subscription_is_created()
    {
        // To make sure we don't start with a Post
        $this->assertCount(0, Subscription::all());


        $response = $this->post('api/subscriptions', [
            [
                'subscriberable_id' => 1,
                'subscriberable_type' => 'Fake\Package',
                'subscriber_id' => 1,
                'subscriber_type' => 'Fake\User',
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-30',
                'status' => 1,
                'payment_type' => 'cash',
                'amount_paid' => 5000,
                'subscription_type_id' => 1,
            ]
        ]);

        $this->assertCount(1, Subscription::all());

        tap(Subscription::first(), function ($subscription) {
            $this->assertEquals(1, $subscription->subscriberable_id);
            $this->assertEquals('Fake\Package', $subscription->subscriberable_type);
            $this->assertEquals(1, $subscription->subscriber_id);
            $this->assertEquals('Fake\User', $subscription->subscriber_type);
            $this->assertEquals('2023-01-01', $subscription->start_date->format('Y-m-d'));
            $this->assertEquals('2023-12-30', $subscription->end_date->format('Y-m-d'));
            $this->assertEquals(1, $subscription->status);
            $this->assertEquals('cash', $subscription->payement_type);
            $this->assertEquals(5000, $subscription->amount_paid);
            $this->assertEquals(1, $subscription->subscription_type_id);
        });
    }

}
