<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePpdbRequest;
use App\Models\PpdbRegistration;
use App\Services\FileUploadService;
use App\Exports\PpdbRegistrationExport;
use App\Enums\RegistrationStatus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PpdbController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of all registrations.
     */
    public function index(Request $request)
    {
        $query = PpdbRegistration::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by school level
        if ($request->filled('school_level')) {
            $query->where('school_level', $request->school_level);
        }

        // Search by name or NIK
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }

        $registrations = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('back.ppdb.index', compact('registrations'));
    }

    /**
     * Display the specified registration.
     */
    public function show($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('back.ppdb.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified registration.
     */
    public function edit($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('back.ppdb.edit', compact('registration'));
    }

    /**
     * Update the specified registration in storage.
     */
    public function update(UpdatePpdbRequest $request, $id)
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

        $registration->update($validated);

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    /**
     * Approve the registration.
     */
    public function approve($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        $registration->update([
            'status' => RegistrationStatus::APPROVED->value,
            'catatan_admin' => null,
        ]);

        return back()->with('success', 'Pendaftaran berhasil diterima.');
    }

    /**
     * Reject the registration with notes.
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string|min:10'
        ], [
            'catatan_admin.required' => 'Catatan penolakan wajib diisi.',
            'catatan_admin.min' => 'Catatan penolakan minimal 10 karakter.',
        ]);

        $registration = PpdbRegistration::findOrFail($id);
        $registration->update([
            'status' => RegistrationStatus::REJECTED->value,
            'catatan_admin' => $request->input('catatan_admin'),
        ]);

        return back()->with('success', 'Pendaftaran berhasil ditolak.');
    }

    /**
     * Remove the specified registration from storage.
     */
    public function destroy($id)
    {
        $registration = PpdbRegistration::findOrFail($id);

        // Delete uploaded files
        $fileFields = ['akta_kelahiran', 'kartu_keluarga', 'foto', 'ijazah'];
        foreach ($fileFields as $field) {
            $this->fileUploadService->delete($registration->$field);
        }

        $registration->delete();

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    /**
     * Export registrations to Excel.
     */
    public function export(Request $request)
    {
        $filename = 'ppdb-registrations-' . date('Y-m-d') . '.xlsx';
        return Excel::download(new PpdbRegistrationExport, $filename);
    }

    /**
     * Reset registration status to pending.
     */
    public function resetStatus($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        $registration->update([
            'status' => RegistrationStatus::PENDING->value,
            'catatan_admin' => null,
        ]);

        return back()->with('success', 'Status pendaftaran berhasil direset ke pending.');
    }
}
