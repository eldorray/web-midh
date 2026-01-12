<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_settings', function (Blueprint $table) {
            $table->id();

            // Basic School Information
            $table->string('school_name');
            $table->string('school_level')->default('sd'); // sd, smp, sma, mi, mts, ma, smk
            $table->text('school_address')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_logo')->nullable();
            $table->string('school_favicon')->nullable();

            // School Identity
            $table->string('npsn')->nullable();
            $table->string('nss')->nullable(); // Nomor Statistik Sekolah
            $table->string('kepala_sekolah')->nullable();
            $table->string('nip_kepala_sekolah')->nullable();
            $table->string('akreditasi')->nullable();

            // Academic Year
            $table->string('tahun_ajaran_aktif')->nullable();

            // PPDB Settings
            $table->boolean('ppdb_open')->default(false);
            $table->date('ppdb_start_date')->nullable();
            $table->date('ppdb_end_date')->nullable();
            $table->text('ppdb_requirements')->nullable();
            $table->text('ppdb_info')->nullable();

            // Social Media (JSON)
            $table->json('social_media')->nullable();

            // Additional Settings
            $table->text('footer_text')->nullable();
            $table->string('google_maps_embed')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_settings');
    }
};
