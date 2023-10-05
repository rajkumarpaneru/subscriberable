<?php

namespace Raajkumarpaneru\Subscriberable\Database\Factories;

use Raajkumarpaneru\Subscriberable\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
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
        ];
    }
}
