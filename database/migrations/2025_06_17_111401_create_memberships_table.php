<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_id', 27)->nullable()->default(NULL);

            $table->enum('amount_type', ['45', '30', '60', '80']);
            $table->decimal('amount', 10, 2)->nullable();

            $table->enum('payment_method', ['cash', 'online', 'crypto', 'bank', 'bulletin']);

            $table->enum('gender', ['mr', 'mrs'])->nullable()->default(NULL);
            $table->string('firstname')->nullable()->default(NULL);
            $table->string('lastname')->nullable()->default(NULL);
            $table->string('email')->nullable()->default(NULL);
            $table->text('notes')->nullable()->default(NULL);

            $table->string('street', 150)->nullable()->default(NULL);
            $table->string('number', 20)->nullable()->default(NULL);
            $table->string('complement', 150)->nullable()->default(NULL);
            $table->string('zipcode', 20)->nullable()->default(NULL);
            $table->string('city', 100)->nullable()->default(NULL);
            $table->enum('country', ['ch-suisse', 'fr-france', 'de-allemagne', 'i-italie', 'a-autriche', 'qc-quebec', 'world'])->nullable();

            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'cancelled'])->default('pending');

            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('user_identifier')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
