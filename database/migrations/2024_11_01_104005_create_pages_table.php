<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_id', 27);
            $table->integer('section_id')->unsigned();
            $table->string('page_identifier', 27)->unique();
            $table->string('category', 100)->nullable()->default(NULL);
            $table->string('icon', 500)->nullable()->default(NULL);
            $table->string('url', 255)->nullable()->default(NULL);
            $table->string('image', 500)->nullable()->default(NULL);
            $table->string('image_responsive', 500)->nullable()->default(NULL);
            $table->string('events_image', 500)->nullable()->default(NULL);
            $table->integer('number')->nullable()->default(NULL);
            $table->string('period', 100)->nullable()->default(NULL);
            $table->integer('year')->nullable()->default(NULL);
            $table->text('title')->nullable()->default(NULL);
            $table->string('subtitle', 50)->nullable()->default(NULL);
            $table->longtext('content')->nullable()->default(NULL);
            $table->longtext('content_sec')->nullable()->default(NULL);
            $table->string('link', 255)->nullable()->default(NULL);
            $table->string('upload_video', 255)->nullable()->default(NULL);
            $table->string('pdf', 255)->nullable()->default(NULL);
            $table->longtext('html_soruce')->nullable()->default(NULL);
            $table->char('is_active', 1)->nullable()->default('1');
            $table->char('is_deleted', 1)->nullable()->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('user_identifier')->on('users');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
