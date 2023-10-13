<?php


namespace Raajkumarpaneru\Subscriberable\Http\Api\Controllers;

use Raajkumarpaneru\Subscriberable\Http\Controllers\Controller;
use Raajkumarpaneru\Subscriberable\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store()
    {
        return Subscription::create([
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
        ]);
    }

    public function show(Subscription $subscription)
    {
        return response()
            ->json($subscription, 200);
    }
}
