<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePpdbRequest;
use App\Http\Requests\UpdatePpdbRequest;
use App\Models\PpdbRegistration;
use App\Services\FileUploadService;
use App\Enums\RegistrationStatus;
use Illuminate\Http\Request;

class PpdbRegistrationController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display the PPDB landing page with status check.
     */
    public function index()
    {
        return view('front.ppdb.index');
    }

    /**
     * Show the form for editing existing registration (front-end).
     */
    public function editFront($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('front.ppdb.edit', compact('registration'));
    }

    /**
     * Update the registration from front-end.
     */
    public function updateFront(UpdatePpdbRequest $request, $id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        $validated = $request->validated();

        // Handle file uploads with compression
        $fileFields = ['akta_kelahiran', 'kartu_keluarga', 'foto', 'ijazah'];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $folder = 'ppdb/' . str_replace('_', '-', $field);
                $validated[$field] = $this->fileUploadService->replace(
                    $request->file($field),
                    $registration->$field,
                    $folder
                );
            }
        }

        // Reset status to pending after update
        $validated['status'] = RegistrationStatus::PENDING->value;
        $validated['catatan_admin'] = null;

        $registration->update($validated);

        return redirect()
            ->route('ppdb.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui dan menunggu verifikasi kembali.');
    }

    /**
     * Check registration status by NIK or NISN.
     */
    public function checkRegistration(Request $request)
    {
        $request->validate([
            'search_value' => 'required|string|min:3|max:20'
        ]);

        $searchValue = $request->input('search_value');

        // Sanitize input - only allow numbers
        $searchValue = preg_replace('/[^0-9]/', '', $searchValue);

        if (empty($searchValue)) {
            return response()->json([
                'success' => false,
                'found' => false,
                'message' => 'Masukkan NIK atau NISN yang valid.'
            ]);
        }

        $registration = PpdbRegistration::where('nik', $searchValue)
            ->orWhere('nisn', $searchValue)
            ->first();

        if ($registration) {
            return response()->json([
                'success' => true,
                'found' => true,
                'data' => [
                    'id' => $registration->id,
                    'nama_lengkap' => $registration->nama_lengkap,
                    'status' => $registration->getStatusLabel(),
                    'status_value' => $registration->status,
                    'catatan_admin' => $registration->catatan_admin,
                    'created_at' => $registration->created_at->format('d-m-Y H:i'),
                ]
            ]);
        }

        return response()->json([
            'success' => true,
            'found' => false,
            'message' => 'Data tidak ditemukan.'
        ]);
    }

    /**
     * Show the registration form.
     */
    public function create()
    {
        $religions = config('school.religions', ['Islam']);
        $schoolLevels = config('school.levels', []);

        return view('front.ppdb.form', compact('religions', 'schoolLevels'));
    }

    /**
     * Store a new registration.
     */
    public function store(StorePpdbRequest $request)
    {
        $validated = $request->validated();

        // Handle file uploads with compression
        $fileFields = [
            'akta_kelahiran' => 'ppdb/akta',
            'kartu_keluarga' => 'ppdb/kk',
            'foto' => 'ppdb/foto',
            'ijazah' => 'ppdb/ijazah',
        ];

        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $validated[$field] = $this->fileUploadService->upload(
                    $request->file($field),
                    $folder
                );
            }
        }

        // Set default status
        $validated['status'] = RegistrationStatus::PENDING->value;

        PpdbRegistration::create($validated);

        return redirect()
            ->route('ppdb.success')
            ->with('success', 'Pendaftaran berhasil! Silahkan tunggu verifikasi dari pihak sekolah.');
    }

    /**
     * Show success page after registration.
     */
    public function success()
    {
        return view('front.ppdb.success');
    }
}
