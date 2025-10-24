<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_history', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_id', 27);
            $table->string('podcast_id');

            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('user_identifier')->on('users');
            $table->foreign('podcast_id')->references('podcast_identifier')->on('podcasts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podcast_history');
    }
}
