<?php


namespace Raajkumarpaneru\Subscriberable\Traits;


use Raajkumarpaneru\Subscriberable\Models\Subscriber;

trait HasSubscribers
{
    public function subscribers()
    {
        return $this->morphMany(Subscriber::class, 'subscriber');
    }
}
