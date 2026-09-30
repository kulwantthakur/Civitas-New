<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIsDeletedColumns extends Migration
{
    /**
     * Tables that have is_deleted column
     */
    private array $tables = [
        'pages',
        'podcasts',
        'podcast_categories',
        'audio_files',
        'donations',
        'memberships',
        'form_submissions',
        'sections',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        foreach ($this->tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'is_deleted')) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->dropColumn('is_deleted');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        foreach ($this->tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->char('is_deleted', 1)->default('0')->after('is_active');
                });
            }
        }
    }
}
