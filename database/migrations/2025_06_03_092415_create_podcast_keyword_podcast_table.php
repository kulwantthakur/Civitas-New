<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastKeywordPodcastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_keyword_podcast', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('podcast_id');
            $table->integer('keyword_id')->unsigned();
            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('podcast_id')->references('podcast_identifier')->on('podcasts');
            $table->foreign('keyword_id')->references('id')->on('podcast_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podcast_keyword_podcast');
    }
}
