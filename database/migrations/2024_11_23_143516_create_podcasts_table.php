<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('podcast_identifier', 27)->unique();
            $table->string('url', 255)->nullable()->default(NULL);
            $table->string('title')->nullable()->default(NULL);
            $table->string('author')->nullable()->default(NULL);
            $table->string('location',50)->nullable()->default(NULL);
            $table->string('start_date',50)->nullable()->default(NULL);
            $table->string('end_date',50)->nullable()->default(NULL);
            $table->longText('description')->nullable()->default(NULL);
            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('podcast_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podcasts');
    }
}
