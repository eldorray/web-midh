<?php

namespace App\Models;

use App\Enums\RegistrationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpdbRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ppdb_registrations';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'asal_sekolah',
        'alamat_lengkap',
        'anak_ke',
        'status_keluarga',
        'kewarganegaraan',
        'nama_ayah',
        'nik_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nomor_telepon',
        'alamat_orang_tua',
        'akta_kelahiran',
        'kartu_keluarga',
        'foto',
        'ijazah',
        'status',
        'catatan_admin',
        'school_level',
        'tahun_ajaran',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Get the status enum instance.
     */
    public function getStatusEnumAttribute(): ?RegistrationStatus
    {
        return RegistrationStatus::tryFrom($this->status);
    }

    /**
     * Get the status badge CSS class.
     */
    public function getStatusBadgeClass(): string
    {
        $statusEnum = $this->status_enum;

        if ($statusEnum) {
            return $statusEnum->badgeClass();
        }

        return 'bg-gray-100 text-gray-800';
    }

    /**
     * Get the status label in Indonesian.
     */
    public function getStatusLabel(): string
    {
        $statusEnum = $this->status_enum;

        if ($statusEnum) {
            return $statusEnum->label();
        }

        return 'Tidak Diketahui';
    }

    /**
     * Get the akta kelahiran URL.
     */
    public function getAktaKelahiranUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->akta_kelahiran);
    }

    /**
     * Get the kartu keluarga URL.
     */
    public function getKartuKeluargaUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->kartu_keluarga);
    }

    /**
     * Get the foto URL.
     */
    public function getFotoUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->foto);
    }

    /**
     * Get the ijazah URL.
     */
    public function getIjazahUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->ijazah);
    }

    /**
     * Helper to get file URL.
     */
    private function getFileUrl(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        return asset('storage/' . $path);
    }

    /**
     * Get formatted tanggal lahir.
     */
    public function getFormattedTanggalLahirAttribute(): string
    {
        return $this->tanggal_lahir?->format('d F Y') ?? '-';
    }

    /**
     * Get formatted tempat tanggal lahir.
     */
    public function getTempatTanggalLahirAttribute(): string
    {
        return $this->tempat_lahir . ', ' . $this->formatted_tanggal_lahir;
    }

    /**
     * Scope to filter by status.
     */
    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to filter pending registrations.
     */
    public function scopePending($query)
    {
        return $query->where('status', RegistrationStatus::PENDING->value);
    }

    /**
     * Scope to filter approved registrations.
     */
    public function scopeApproved($query)
    {
        return $query->where('status', RegistrationStatus::APPROVED->value);
    }

    /**
     * Scope to filter rejected registrations.
     */
    public function scopeRejected($query)
    {
        return $query->where('status', RegistrationStatus::REJECTED->value);
    }
}
