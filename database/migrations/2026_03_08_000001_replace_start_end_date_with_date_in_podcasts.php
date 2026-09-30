<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceStartEndDateWithDateInPodcasts extends Migration
{
    public function up()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('date', 100)->nullable()->default(null)->after('location');
        });

        // Μεταφορά δεδομένων: αν υπάρχουν και start και end, τα ενώνουμε
        DB::table('podcasts')->get()->each(function ($podcast) {
            if ($podcast->start_date && $podcast->end_date) {
                $date = $podcast->start_date . ' - ' . $podcast->end_date;
            } else {
                $date = $podcast->start_date ?? null;
            }
            DB::table('podcasts')->where('id', $podcast->id)->update(['date' => $date]);
        });

        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date']);
        });
    }

    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('start_date', 50)->nullable()->default(null);
            $table->string('end_date', 50)->nullable()->default(null);
            $table->dropColumn('date');
        });
    }
}
