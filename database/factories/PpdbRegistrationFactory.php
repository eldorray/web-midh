<?php

namespace Database\Factories;

use App\Models\PpdbRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PpdbRegistration>
 */
class PpdbRegistrationFactory extends Factory
{
    protected $model = PpdbRegistration::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => fake()->name(),
            'nik' => fake()->unique()->numerify('################'), // 16 digits
            'nisn' => fake()->unique()->numerify('##########'), // 10 digits
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTimeBetween('-12 years', '-6 years')->format('Y-m-d'),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => 'Islam',
            'asal_sekolah' => fake()->company() . ' TK',
            'alamat_lengkap' => fake()->address(),
            'anak_ke' => fake()->numberBetween(1, 5),
            'status_keluarga' => fake()->randomElement(['Anak kandung', 'Anak angkat']),
            'kewarganegaraan' => 'Indonesia',
            'nama_ayah' => fake()->name('male'),
            'nik_ayah' => fake()->numerify('################'),
            'pendidikan_ayah' => fake()->randomElement(['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'D4/S1', 'S2', 'S3']),
            'pekerjaan_ayah' => fake()->randomElement(['PNS', 'Karyawan Swasta', 'Wiraswasta', 'Petani']),
            'penghasilan_ayah' => fake()->randomElement(['< Rp 1.000.000', 'Rp 1.000.000 - Rp 2.000.000', 'Rp 2.000.000 - Rp 3.000.000']),
            'nama_ibu' => fake()->name('female'),
            'nik_ibu' => fake()->numerify('################'),
            'pendidikan_ibu' => fake()->randomElement(['SD/MI', 'SMP/MTs', 'SMA/SMK/MA', 'D4/S1', 'S2', 'S3']),
            'pekerjaan_ibu' => fake()->randomElement(['Ibu Rumah Tangga', 'PNS', 'Karyawan Swasta', 'Wiraswasta']),
            'penghasilan_ibu' => fake()->randomElement(['< Rp 1.000.000', 'Rp 1.000.000 - Rp 2.000.000', 'Rp 2.000.000 - Rp 3.000.000']),
            'nomor_telepon' => fake()->numerify('08##########'),
            'alamat_orang_tua' => fake()->address(),
            'akta_kelahiran' => 'ppdb/akta/test.pdf',
            'kartu_keluarga' => 'ppdb/kk/test.pdf',
            'status' => 'pending',
            'catatan_admin' => null,
        ];
    }

    /**
     * Indicate that the registration is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the registration is approved.
     */
    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
        ]);
    }

    /**
     * Indicate that the registration is rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
            'catatan_admin' => 'Data tidak lengkap atau tidak valid.',
        ]);
    }
}
