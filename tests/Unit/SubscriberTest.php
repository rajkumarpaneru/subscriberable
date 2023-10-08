<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;
use Raajkumarpaneru\Subscriberable\Models\Subscriber;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function subscriber_can_be_created()
    {
        $subscriber = Subscriber::factory()->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);
        $this->assertDatabaseCount('subscribers', 1);
//        $this->assertDatabaseHas('subscribers', $subscriber->toArray());
    }

    /** @test */
    public function subscriber_can_be_read()
    {
        $subscriber = Subscriber::factory()->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);

        $found = Subscriber::find($subscriber->id);
        $this->assertEquals($found->id, $subscriber->id);
    }

    /** @test */
    public function subscriber_can_be_updated()
    {
        $subscriber = Subscriber::factory()->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);

        $updatedData = [
            'status' => 0,
            'payment_type' => 'Credit Card',
        ];

        $subscriber->update($updatedData);
        $subscriber->refresh();
        $this->assertEquals($subscriber->payment_type, 'Credit Card');
        $this->assertEquals($subscriber->status, 0);
        $this->assertDatabaseHas('subscribers', $updatedData);
    }

    /** @test */
    public function subscriber_can_be_deleted()
    {
        $subscriber = Subscriber::factory()->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);
        $subscriber->delete();
        $this->assertDeleted($subscriber);
    }
}
