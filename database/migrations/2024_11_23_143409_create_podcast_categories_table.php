<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast_categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('podcast_category_identifier', 27)->unique();
            $table->string('url', 255)->nullable()->default(NULL);
            $table->string('name', 50)->nullable()->default(NULL);
            $table->string('icon', 500)->nullable()->default(NULL);
            $table->string('image', 500)->nullable()->default(NULL);
            $table->string('color', 7)->nullable()->default(NULL);
            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
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
        Schema::dropIfExists('podcast_categories');
    }
}
