<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            // Add new columns
            $table->string('school_level')->nullable()->after('status');
            $table->string('tahun_ajaran')->nullable()->after('school_level');
            $table->string('foto')->nullable()->after('kartu_keluarga');
            $table->string('ijazah')->nullable()->after('foto');
            $table->softDeletes()->after('updated_at');
        });

        // Change agama column from enum to string for flexibility
        // Note: This is done in a separate statement for SQLite compatibility
        if (config('database.default') === 'mysql') {
            DB::statement("ALTER TABLE ppdb_registrations MODIFY agama VARCHAR(50) DEFAULT 'Islam'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppdb_registrations', function (Blueprint $table) {
            $table->dropColumn(['school_level', 'tahun_ajaran', 'foto', 'ijazah']);
            $table->dropSoftDeletes();
        });

        // Revert agama column back to enum
        if (config('database.default') === 'mysql') {
            DB::statement("ALTER TABLE ppdb_registrations MODIFY agama ENUM('Islam') DEFAULT 'Islam'");
        }
    }
};
