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
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();

            // Student Data
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->string('nisn')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam'])->default('Islam');
            $table->string('asal_sekolah')->nullable();
            $table->text('alamat_lengkap');
            $table->integer('anak_ke');
            $table->enum('status_keluarga', ['Anak kandung', 'Anak angkat']);
            $table->string('kewarganegaraan')->default('Indonesia');

            // Father Data
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');

            // Mother Data
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');

            // Contact & Address
            $table->string('nomor_telepon');
            $table->text('alamat_orang_tua')->nullable();

            // Files
            $table->string('akta_kelahiran');
            $table->string('kartu_keluarga');

            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
