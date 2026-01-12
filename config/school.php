<?php

return [

    /*
    |--------------------------------------------------------------------------
    | School Levels
    |--------------------------------------------------------------------------
    |
    | Available school levels for the universal school application.
    | These can be used in registration forms and school settings.
    |
    */

    'levels' => [
        'sd' => 'Sekolah Dasar (SD)',
        'smp' => 'Sekolah Menengah Pertama (SMP)',
        'sma' => 'Sekolah Menengah Atas (SMA)',
        'smk' => 'Sekolah Menengah Kejuruan (SMK)',
        'mi' => 'Madrasah Ibtidaiyah (MI)',
        'mts' => 'Madrasah Tsanawiyah (MTs)',
        'ma' => 'Madrasah Aliyah (MA)',
        'tk' => 'Taman Kanak-Kanak (TK)',
        'ra' => 'Raudhatul Athfal (RA)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Religions
    |--------------------------------------------------------------------------
    |
    | Available religion options for student registration forms.
    |
    */

    'religions' => [
        'Islam',
        'Kristen',
        'Katolik',
        'Hindu',
        'Buddha',
        'Konghucu',
    ],

    /*
    |--------------------------------------------------------------------------
    | Education Levels (for parents)
    |--------------------------------------------------------------------------
    |
    | Education level options for parent data in registration forms.
    |
    */

    'education_levels' => [
        'Tidak Sekolah',
        'SD/MI',
        'SMP/MTs',
        'SMA/SMK/MA',
        'D1',
        'D2',
        'D3',
        'D4/S1',
        'S2',
        'S3',
    ],

    /*
    |--------------------------------------------------------------------------
    | Income Ranges
    |--------------------------------------------------------------------------
    |
    | Income range options for parent data in registration forms.
    |
    */

    'income_ranges' => [
        '< Rp 1.000.000',
        'Rp 1.000.000 - Rp 2.000.000',
        'Rp 2.000.000 - Rp 3.000.000',
        'Rp 3.000.000 - Rp 5.000.000',
        'Rp 5.000.000 - Rp 10.000.000',
        '> Rp 10.000.000',
    ],

    /*
    |--------------------------------------------------------------------------
    | Job Types
    |--------------------------------------------------------------------------
    |
    | Common job types for parent data in registration forms.
    |
    */

    'job_types' => [
        'PNS',
        'TNI/Polri',
        'Karyawan Swasta',
        'Wiraswasta',
        'Petani',
        'Nelayan',
        'Buruh',
        'Pedagang',
        'Pensiunan',
        'Tidak Bekerja',
        'Ibu Rumah Tangga',
        'Lainnya',
    ],

    /*
    |--------------------------------------------------------------------------
    | Accreditation Levels
    |--------------------------------------------------------------------------
    |
    | School accreditation level options.
    |
    */

    'accreditations' => [
        'A' => 'Akreditasi A (Unggul)',
        'B' => 'Akreditasi B (Baik)',
        'C' => 'Akreditasi C (Cukup)',
        'Belum' => 'Belum Terakreditasi',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Compression Settings
    |--------------------------------------------------------------------------
    |
    | Default settings for image compression.
    |
    */

    'image' => [
        'quality' => 80,
        'max_width' => 1920,
        'format' => 'webp',
    ],

];
