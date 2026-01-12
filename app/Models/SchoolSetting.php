<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SchoolSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'school_level',
        'school_address',
        'school_phone',
        'school_email',
        'school_website',
        'school_logo',
        'school_favicon',
        'npsn',
        'nss',
        'kepala_sekolah',
        'nip_kepala_sekolah',
        'akreditasi',
        'tahun_ajaran_aktif',
        'ppdb_open',
        'ppdb_start_date',
        'ppdb_end_date',
        'ppdb_requirements',
        'ppdb_info',
        'social_media',
        'footer_text',
        'google_maps_embed',
    ];

    protected $casts = [
        'ppdb_open' => 'boolean',
        'ppdb_start_date' => 'date',
        'ppdb_end_date' => 'date',
        'social_media' => 'array',
    ];

    /**
     * Cache key for storing the active settings.
     */
    protected const CACHE_KEY = 'school_settings';

    /**
     * Get the active school settings (singleton pattern).
     */
    public static function getActive(): ?self
    {
        return Cache::remember(self::CACHE_KEY, 3600, function () {
            return self::first();
        });
    }

    /**
     * Alias for getActive - used in views.
     */
    public static function getSettings(): ?self
    {
        return self::getActive();
    }

    /**
     * Clear the settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Boot method to clear cache on save.
     */
    protected static function booted()
    {
        static::saved(function () {
            self::clearCache();
        });

        static::deleted(function () {
            self::clearCache();
        });
    }

    /**
     * Get the school level label.
     */
    public function getSchoolLevelLabelAttribute(): string
    {
        $levels = config('school.levels', []);
        return $levels[$this->school_level] ?? $this->school_level;
    }

    /**
     * Accessor for logo (alias for school_logo).
     */
    public function getLogoAttribute(): ?string
    {
        return $this->school_logo;
    }

    /**
     * Accessor for favicon (alias for school_favicon).
     */
    public function getFaviconAttribute(): ?string
    {
        return $this->school_favicon;
    }

    /**
     * Accessor for address (alias for school_address).
     */
    public function getAddressAttribute(): ?string
    {
        return $this->school_address;
    }

    /**
     * Accessor for email (alias for school_email).
     */
    public function getEmailAttribute(): ?string
    {
        return $this->school_email;
    }

    /**
     * Accessor for phone (alias for school_phone).
     */
    public function getPhoneAttribute(): ?string
    {
        return $this->school_phone;
    }

    /**
     * Accessor for website (alias for school_website).
     */
    public function getWebsiteAttribute(): ?string
    {
        return $this->school_website;
    }

    /**
     * Accessor for nsm (alias for nss).
     */
    public function getNsmAttribute(): ?string
    {
        return $this->nss;
    }

    /**
     * Accessor for headmaster_name (alias for kepala_sekolah).
     */
    public function getHeadmasterNameAttribute(): ?string
    {
        return $this->kepala_sekolah;
    }

    /**
     * Accessor for accreditation (alias for akreditasi).
     */
    public function getAccreditationAttribute(): ?string
    {
        return $this->akreditasi;
    }

    /**
     * Get the school logo URL.
     */
    public function getLogoUrlAttribute(): ?string
    {
        if (empty($this->school_logo)) {
            return null;
        }

        if (filter_var($this->school_logo, FILTER_VALIDATE_URL)) {
            return $this->school_logo;
        }

        return asset('storage/' . $this->school_logo);
    }

    /**
     * Get the school favicon URL.
     */
    public function getFaviconUrlAttribute(): ?string
    {
        if (empty($this->school_favicon)) {
            return null;
        }

        if (filter_var($this->school_favicon, FILTER_VALIDATE_URL)) {
            return $this->school_favicon;
        }

        return asset('storage/' . $this->school_favicon);
    }

    /**
     * Check if PPDB is currently open.
     */
    public function isPpdbOpen(): bool
    {
        if (!$this->ppdb_open) {
            return false;
        }

        $today = now()->toDateString();

        if ($this->ppdb_start_date && $today < $this->ppdb_start_date->toDateString()) {
            return false;
        }

        if ($this->ppdb_end_date && $today > $this->ppdb_end_date->toDateString()) {
            return false;
        }

        return true;
    }

    /**
     * Get a specific social media link.
     */
    public function getSocialMedia(string $platform): ?string
    {
        return $this->social_media[$platform] ?? null;
    }

    /**
     * Get formatted PPDB period.
     */
    public function getPpdbPeriodAttribute(): ?string
    {
        if (!$this->ppdb_start_date || !$this->ppdb_end_date) {
            return null;
        }

        return $this->ppdb_start_date->format('d M Y') . ' - ' . $this->ppdb_end_date->format('d M Y');
    }

    /**
     * Get academic year options for forms.
     */
    public static function getAcademicYearOptions(): array
    {
        $currentYear = (int) date('Y');
        $years = [];

        for ($i = -1; $i <= 2; $i++) {
            $startYear = $currentYear + $i;
            $endYear = $startYear + 1;
            $years["{$startYear}/{$endYear}"] = "{$startYear}/{$endYear}";
        }

        return $years;
    }
}
