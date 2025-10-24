<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->unsignedInteger('donation_id');

            $table->string('user_email');
            $table->integer('amount');
            $table->string('currency')->default('CHF');
            $table->string('payrexx_id')->nullable();
            $table->string('payrexx_link')->nullable();
            $table->string('payrexx_status')->nullable();
            $table->string('payrexx_reference')->nullable();
            $table->json('payrexx_raw_response')->nullable();
            $table->timestamps();

            $table->foreign('donation_id')->references('id')->on('donations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
