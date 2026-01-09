<?php

namespace App\Exports;

use App\Models\PpdbRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PpdbRegistrationExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return PpdbRegistration::orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            // No
            'No',
            // Student Data
            'Nama Lengkap',
            'NIK',
            'NISN',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Asal Sekolah',
            'Alamat Lengkap',
            'Anak Ke',
            'Status Keluarga',
            'Kewarganegaraan',
            // Father Data
            'Nama Ayah',
            'NIK Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            // Mother Data
            'Nama Ibu',
            'NIK Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            // Contact & Address
            'Nomor Telepon',
            'Alamat Orang Tua',
            // Status
            'Status',
            'Catatan Admin',
            'Tanggal Daftar',
        ];
    }

    public function map($registration): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            // Student Data
            $registration->nama_lengkap,
            "'" . $registration->nik, // Prefix with quote to prevent Excel converting to number
            $registration->nisn ? "'" . $registration->nisn : '',
            $registration->tempat_lahir,
            $registration->tanggal_lahir->format('d-m-Y'),
            $registration->jenis_kelamin,
            $registration->agama,
            $registration->asal_sekolah,
            $registration->alamat_lengkap,
            $registration->anak_ke,
            $registration->status_keluarga,
            $registration->kewarganegaraan,
            // Father Data
            $registration->nama_ayah,
            "'" . $registration->nik_ayah,
            $registration->pendidikan_ayah,
            $registration->pekerjaan_ayah,
            $registration->penghasilan_ayah,
            // Mother Data
            $registration->nama_ibu,
            "'" . $registration->nik_ibu,
            $registration->pendidikan_ibu,
            $registration->pekerjaan_ibu,
            $registration->penghasilan_ibu,
            // Contact & Address
            $registration->nomor_telepon,
            $registration->alamat_orang_tua,
            // Status
            $registration->getStatusLabel(),
            $registration->catatan_admin,
            $registration->created_at->format('d-m-Y H:i'),
        ];
    }
}
