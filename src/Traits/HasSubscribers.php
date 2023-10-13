<?php


namespace Raajkumarpaneru\Subscriberable\Traits;


use Raajkumarpaneru\Subscriberable\Models\Subscription;

trait HasSubscribers
{
    public function subscribers()
    {
        return $this->morphMany(Subscription::class, 'subscriber');
    }
}
