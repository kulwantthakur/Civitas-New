<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastKeywordCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_keyword_category', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('podcast_categories');
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
        Schema::dropIfExists('podcast_keyword_category');
    }
}
