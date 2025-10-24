<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_id', 27)->nullable()->default(NULL);
            $table->string('source_page')->nullable()->default(NULL);
            $table->enum('gender', ['mr', 'mrs'])->nullable();
            $table->string('email')->nullable()->default(NULL);
            $table->string('firstname')->nullable()->default(NULL);
            $table->string('lastname')->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->string('post_code')->nullable()->default(NULL);
            $table->string('canton_province')->nullable()->default(NULL);
            $table->string('country')->nullable()->default(NULL);
            $table->string('articles')->nullable()->default(NULL);
            $table->string('reference')->nullable()->default(NULL);
            $table->string('titre_detail')->nullable()->default(NULL);
            $table->string('quantity')->nullable()->default(NULL);
            $table->string('price')->nullable()->default(NULL);

            $table->longText('comment')->nullable();

            $table->char('analyses_opinions', 1)->default('0');
            $table->char('events_civitas', 1)->default('0');
            $table->char('news', 1)->default('0');

            $table->char('bulletin', 1)->default('0');
            $table->char('romkurier', 1)->default('0');
            $table->char('events_amissfs', 1)->default('0');

            $table->char('agree_terms', 1)->default('0');

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
        Schema::dropIfExists('form_submissions');
    }
}
