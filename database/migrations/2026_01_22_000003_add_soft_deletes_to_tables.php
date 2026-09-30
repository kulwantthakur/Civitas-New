<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddSoftDeletesToTables extends Migration
{
    /**
     * Tables to add soft deletes to
     */
    private array $tables = [
        'users',
        'sections',
        'pages',
        'podcasts',
        'podcast_categories',
        'podcast_keywords',
        'podcast_keyword_podcast',
        'podcast_keyword_category',
        'podcast_history',
        'audio_files',
        'donations',
        'memberships',
        'form_submissions',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        foreach ($this->tables as $table) {
            if (!Schema::hasTable($table)) {
                continue;
            }

            // Check if deleted_at column already exists
            if (Schema::hasColumn($table, 'deleted_at')) {
                continue;
            }

            Schema::table($table, function (Blueprint $blueprint) use ($table) {
                // Add soft deletes column
                $blueprint->softDeletes();
            });

            // Migrate existing is_deleted data to deleted_at
            if (Schema::hasColumn($table, 'is_deleted')) {
                DB::statement("
                    UPDATE `{$table}` 
                    SET `deleted_at` = NOW() 
                    WHERE `is_deleted` = 1 OR `is_deleted` = '1'
                ");
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
            if (!Schema::hasTable($table)) {
                continue;
            }

            if (!Schema::hasColumn($table, 'deleted_at')) {
                continue;
            }

            // Restore is_deleted data from deleted_at
            if (Schema::hasColumn($table, 'is_deleted')) {
                DB::statement("
                    UPDATE `{$table}` 
                    SET `is_deleted` = CASE WHEN `deleted_at` IS NOT NULL THEN 1 ELSE 0 END
                ");
            }

            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->dropSoftDeletes();
            });
        }
    }
}
