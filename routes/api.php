<?php

use Illuminate\Support\Facades\Route;
use Raajkumarpaneru\Subscriberable\Http\Api\Controllers\SubscriptionController;

Route::post('api/subscriptions', [SubscriptionController::class, 'store']);
Route::get('api/subscriptions/{subscription}', [SubscriptionController::class, 'show']);
