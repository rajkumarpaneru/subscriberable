<?php

namespace Raajkumarpaneru\Subscriberable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Raajkumarpaneru\Subscriberable\Database\Factories\SubscriberFactory::new();
    }

}
