<?php

namespace Database\Seeders;

use App\Models\SchoolSetting;
use Illuminate\Database\Seeder;

class SchoolSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolSetting::updateOrCreate(
            ['id' => 1],
            [
                'school_name' => 'Nama Sekolah Anda',
                'school_level' => 'mi', // Default to MI
                'school_address' => 'Jl. Contoh No. 123, Kota, Provinsi',
                'school_phone' => '021-1234567',
                'school_email' => 'info@sekolah.sch.id',
                'school_website' => 'https://sekolah.sch.id',
                'npsn' => '12345678',
                'nss' => '111233040001',
                'kepala_sekolah' => 'Nama Kepala Sekolah',
                'akreditasi' => 'A',
                'tahun_ajaran_aktif' => date('Y') . '/' . (date('Y') + 1),
                'school_logo' => null,
                'school_favicon' => null,
                'ppdb_open' => true,
                'ppdb_start_date' => now()->startOfYear(),
                'ppdb_end_date' => now()->endOfYear(),
                'social_media' => [
                    'facebook' => '',
                    'instagram' => '',
                    'youtube' => '',
                    'whatsapp' => '',
                ],
            ]
        );
    }
}
