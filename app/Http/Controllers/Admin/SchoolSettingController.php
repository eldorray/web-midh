<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class SchoolSettingController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Show the school settings form.
     */
    public function index()
    {
        $setting = SchoolSetting::first() ?? new SchoolSetting();
        $schoolLevels = config('school.levels', []);
        $accreditations = config('school.accreditations', []);
        $academicYears = SchoolSetting::getAcademicYearOptions();

        return view('back.settings.index', compact('setting', 'schoolLevels', 'accreditations', 'academicYears'));
    }

    /**
     * Update the school settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'school_level' => 'required|string|max:50',
            'school_address' => 'nullable|string',
            'school_phone' => 'nullable|string|max:20',
            'school_email' => 'nullable|email|max:255',
            'school_website' => 'nullable|url|max:255',
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'school_favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg|max:512',
            'npsn' => 'nullable|string|max:20',
            'nss' => 'nullable|string|max:30',
            'kepala_sekolah' => 'nullable|string|max:255',
            'nip_kepala_sekolah' => 'nullable|string|max:30',
            'akreditasi' => 'nullable|string|max:20',
            'tahun_ajaran_aktif' => 'nullable|string|max:20',
            'ppdb_open' => 'nullable|boolean',
            'ppdb_start_date' => 'nullable|date',
            'ppdb_end_date' => 'nullable|date|after_or_equal:ppdb_start_date',
            'ppdb_requirements' => 'nullable|string',
            'ppdb_info' => 'nullable|string',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_tiktok' => 'nullable|url|max:255',
            'social_whatsapp' => 'nullable|string|max:20',
            'footer_text' => 'nullable|string|max:500',
            'google_maps_embed' => 'nullable|string',
        ]);

        $setting = SchoolSetting::first();

        // Handle logo upload
        if ($request->hasFile('school_logo')) {
            $validated['school_logo'] = $this->fileUploadService->replace(
                $request->file('school_logo'),
                $setting?->school_logo,
                'settings'
            );
        }

        // Handle favicon upload
        if ($request->hasFile('school_favicon')) {
            $validated['school_favicon'] = $this->fileUploadService->replace(
                $request->file('school_favicon'),
                $setting?->school_favicon,
                'settings',
                'public',
                false // Don't compress favicon
            );
        }

        // Handle ppdb_open checkbox
        $validated['ppdb_open'] = $request->boolean('ppdb_open');

        // Compile social media into JSON
        $validated['social_media'] = [
            'facebook' => $request->input('social_facebook'),
            'instagram' => $request->input('social_instagram'),
            'youtube' => $request->input('social_youtube'),
            'twitter' => $request->input('social_twitter'),
            'tiktok' => $request->input('social_tiktok'),
            'whatsapp' => $request->input('social_whatsapp'),
        ];

        // Remove individual social fields from validated
        unset(
            $validated['social_facebook'],
            $validated['social_instagram'],
            $validated['social_youtube'],
            $validated['social_twitter'],
            $validated['social_tiktok'],
            $validated['social_whatsapp']
        );

        if ($setting) {
            $setting->update($validated);
        } else {
            SchoolSetting::create($validated);
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Pengaturan sekolah berhasil diperbarui.');
    }
}
