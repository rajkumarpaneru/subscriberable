<?php

namespace Raajkumarpaneru\Subscriberable\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Raajkumarpaneru\Subscriberable\Tests\TestCase;
use Raajkumarpaneru\Subscriberable\Models\Subscriber;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_create_subscriber()
    {
        $subscriber = Subscriber::factory()->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);
        $this->assertDatabaseCount('subscribers', 1);
//        $this->assertDatabaseHas('subscribers', $subscriber->toArray());
    }

    /** @test */
    public function test_can_read_subscriber()
    {
        $subscriber = factory(Subscriber::class)->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);

        $found = Subscriber::find($subscriber->id);
        $this->assertEquals($found->id, $subscriber->id);
    }

    /** @test */
    public function test_can_update_subscriber()
    {
        $subscriber = factory(Subscriber::class)->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);

        $updatedData = [
            'status' => false,
            'payment_type' => 'Credit Card',
        ];

        $subscriber->update($updatedData);
        $this->assertDatabaseHas('subscribers', $updatedData);
    }

    /** @test */
    public function test_can_delete_subscriber()
    {
        $subscriber = factory(Subscriber::class)->create();
        $this->assertInstanceOf(Subscriber::class, $subscriber);

        $subscriber->delete();
        $this->assertDeleted($subscriber);
    }
}
