<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscriberable_id');
            $table->string('subscriberable_type');
            $table->unsignedBigInteger('subscriber_id');
            $table->string('subscriber_type');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->boolean('status');
            $table->string('payment_type');
            $table->unsignedBigInteger('amount_paid');
            $table->unsignedBigInteger('subscription_type_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
