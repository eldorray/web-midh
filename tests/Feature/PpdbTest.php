<?php

namespace Tests\Feature;

use App\Models\PpdbRegistration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PpdbTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    /**
     * Test public can view PPDB landing page.
     */
    public function test_public_can_view_ppdb_landing_page(): void
    {
        $response = $this->get(route('ppdb.index'));
        $response->assertStatus(200);
    }

    /**
     * Test public can view PPDB registration form.
     */
    public function test_public_can_view_ppdb_form(): void
    {
        $response = $this->get(route('ppdb.create'));
        $response->assertStatus(200);
    }

    /**
     * Test public can submit PPDB registration.
     */
    public function test_public_can_submit_ppdb_registration(): void
    {
        $data = $this->getValidRegistrationData();

        $response = $this->post(route('ppdb.store'), $data);

        $response->assertRedirect(route('ppdb.success'));
        $this->assertDatabaseHas('ppdb_registrations', [
            'nama_lengkap' => $data['nama_lengkap'],
            'nik' => $data['nik'],
            'status' => 'pending',
        ]);
    }

    /**
     * Test PPDB registration validation - NIK required.
     */
    public function test_ppdb_registration_requires_nik(): void
    {
        $data = $this->getValidRegistrationData();
        unset($data['nik']);

        $response = $this->post(route('ppdb.store'), $data);

        $response->assertSessionHasErrors('nik');
    }

    /**
     * Test PPDB registration validation - NIK must be 16 digits.
     */
    public function test_ppdb_registration_nik_must_be_16_digits(): void
    {
        $data = $this->getValidRegistrationData();
        $data['nik'] = '123456'; // Invalid - not 16 digits

        $response = $this->post(route('ppdb.store'), $data);

        $response->assertSessionHasErrors('nik');
    }

    /**
     * Test PPDB registration validation - unique NIK.
     */
    public function test_ppdb_registration_nik_must_be_unique(): void
    {
        // Create existing registration
        PpdbRegistration::factory()->create(['nik' => '1234567890123456']);

        $data = $this->getValidRegistrationData();
        $data['nik'] = '1234567890123456'; // Duplicate

        $response = $this->post(route('ppdb.store'), $data);

        $response->assertSessionHasErrors('nik');
    }

    /**
     * Test check registration status by NIK.
     */
    public function test_can_check_registration_status_by_nik(): void
    {
        $registration = PpdbRegistration::factory()->create([
            'nik' => '1234567890123456',
            'status' => 'pending',
        ]);

        $response = $this->post(route('ppdb.check'), [
            'search_value' => '1234567890123456',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'found' => true,
            'data' => [
                'nama_lengkap' => $registration->nama_lengkap,
            ],
        ]);
    }

    /**
     * Test check registration returns not found for invalid NIK.
     */
    public function test_check_registration_returns_not_found(): void
    {
        $response = $this->post(route('ppdb.check'), [
            'search_value' => '9999999999999999',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'found' => false,
        ]);
    }

    /**
     * Test admin can view PPDB list.
     */
    public function test_admin_can_view_ppdb_list(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        PpdbRegistration::factory()->count(5)->create();

        $response = $this->actingAs($admin)->get(route('admin.ppdb.index'));

        $response->assertStatus(200);
    }

    /**
     * Test non-admin cannot access PPDB admin.
     */
    public function test_non_admin_cannot_access_ppdb_admin(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get(route('admin.ppdb.index'));

        $response->assertStatus(403);
    }

    /**
     * Test admin can approve registration.
     */
    public function test_admin_can_approve_registration(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $registration = PpdbRegistration::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($admin)
            ->post(route('admin.ppdb.approve', $registration->id));

        $response->assertRedirect();
        $this->assertDatabaseHas('ppdb_registrations', [
            'id' => $registration->id,
            'status' => 'approved',
        ]);
    }

    /**
     * Test admin can reject registration with notes.
     */
    public function test_admin_can_reject_registration(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $registration = PpdbRegistration::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($admin)
            ->post(route('admin.ppdb.reject', $registration->id), [
                'catatan_admin' => 'Data tidak lengkap, silakan lengkapi berkas.',
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('ppdb_registrations', [
            'id' => $registration->id,
            'status' => 'rejected',
            'catatan_admin' => 'Data tidak lengkap, silakan lengkapi berkas.',
        ]);
    }

    /**
     * Get valid registration data for testing.
     */
    private function getValidRegistrationData(): array
    {
        return [
            'nama_lengkap' => 'Ahmad Test',
            'nik' => '3201234567890123',
            'nisn' => '1234567890',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2015-01-15',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'asal_sekolah' => 'TK Ceria',
            'alamat_lengkap' => 'Jl. Test No. 123',
            'anak_ke' => 1,
            'status_keluarga' => 'Anak kandung',
            'kewarganegaraan' => 'Indonesia',
            'nama_ayah' => 'Test Ayah',
            'nik_ayah' => '3201234567890124',
            'pendidikan_ayah' => 'Sarjana',
            'pekerjaan_ayah' => 'Karyawan Swasta',
            'penghasilan_ayah' => 'Rp 5.000.000 - Rp 10.000.000',
            'nama_ibu' => 'Test Ibu',
            'nik_ibu' => '3201234567890125',
            'pendidikan_ibu' => 'Sarjana',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'penghasilan_ibu' => '< Rp 1.000.000',
            'nomor_telepon' => '081234567890',
            'akta_kelahiran' => UploadedFile::fake()->create('akta.pdf', 1000, 'application/pdf'),
            'kartu_keluarga' => UploadedFile::fake()->create('kk.pdf', 1000, 'application/pdf'),
        ];
    }
}
