<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePpdbRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Get the ID from route parameter (supports both 'id' and 'ppdb' parameters)
        $id = $this->route('id') ?? $this->route('ppdb') ?? $this->route('registration');

        return [
            // Student Data
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|unique:ppdb_registrations,nik,' . $id . '|size:16',
            'nisn' => 'nullable|string|size:10|unique:ppdb_registrations,nisn,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'asal_sekolah' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'anak_ke' => 'required|integer|min:1',
            'status_keluarga' => 'required|in:Anak kandung,Anak angkat',
            'kewarganegaraan' => 'required|string|max:255',

            // Father Data
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|string|size:16',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',

            // Mother Data
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|string|size:16',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',

            // Contact
            'nomor_telepon' => 'required|string|min:10|max:15',
            'alamat_orang_tua' => 'nullable|string',

            // Files (nullable for update - only validate if new file is uploaded)
            'akta_kelahiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

            // Additional fields
            'school_level' => 'nullable|string|max:50',
            'tahun_ajaran' => 'nullable|string|max:20',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nik.unique' => 'NIK sudah terdaftar sebelumnya',
            'nik.size' => 'NIK harus 16 digit',
            'nisn.unique' => 'NISN sudah terdaftar sebelumnya',
            'nisn.size' => 'NISN harus 10 digit',
            'nik_ayah.size' => 'NIK Ayah harus 16 digit',
            'nik_ibu.size' => 'NIK Ibu harus 16 digit',
            'nomor_telepon.min' => 'Nomor telepon minimal 10 digit',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 digit',
            'akta_kelahiran.max' => 'Ukuran file akta kelahiran maksimal 2MB',
            'kartu_keluarga.max' => 'Ukuran file kartu keluarga maksimal 2MB',
            'foto.max' => 'Ukuran foto maksimal 2MB',
            'ijazah.max' => 'Ukuran file ijazah maksimal 2MB',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'agama.required' => 'Agama wajib dipilih',
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nama_lengkap' => 'nama lengkap',
            'nik' => 'NIK',
            'nisn' => 'NISN',
            'tempat_lahir' => 'tempat lahir',
            'tanggal_lahir' => 'tanggal lahir',
            'jenis_kelamin' => 'jenis kelamin',
            'agama' => 'agama',
            'asal_sekolah' => 'asal sekolah',
            'alamat_lengkap' => 'alamat lengkap',
            'anak_ke' => 'anak ke',
            'status_keluarga' => 'status keluarga',
            'kewarganegaraan' => 'kewarganegaraan',
            'nama_ayah' => 'nama ayah',
            'nik_ayah' => 'NIK ayah',
            'pendidikan_ayah' => 'pendidikan ayah',
            'pekerjaan_ayah' => 'pekerjaan ayah',
            'penghasilan_ayah' => 'penghasilan ayah',
            'nama_ibu' => 'nama ibu',
            'nik_ibu' => 'NIK ibu',
            'pendidikan_ibu' => 'pendidikan ibu',
            'pekerjaan_ibu' => 'pekerjaan ibu',
            'penghasilan_ibu' => 'penghasilan ibu',
            'nomor_telepon' => 'nomor telepon',
            'alamat_orang_tua' => 'alamat orang tua',
            'akta_kelahiran' => 'akta kelahiran',
            'kartu_keluarga' => 'kartu keluarga',
            'foto' => 'pas foto',
            'ijazah' => 'ijazah',
        ];
    }
}
