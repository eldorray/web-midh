<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PpdbRegistration;
use Illuminate\Support\Facades\Storage;
use App\Exports\PpdbRegistrationExport;
use Maatwebsite\Excel\Facades\Excel;

class PpdbRegistrationController extends Controller
{
    // Public Pages
    public function index()
    {
        $registrations = PpdbRegistration::all();
        return view('front.ppdb.index', compact('registrations'));
    }

    public function editFront($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('front.ppdb.edit', compact('registration'));
    }

    public function updateFront(Request $request, $id)
    {
        $registration = PpdbRegistration::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'nik'               => 'required|string|unique:ppdb_registrations,nik,' . $id . '|size:16',
            'nisn'              => 'nullable|string|size:10|unique:ppdb_registrations,nisn,' . $id,
            'tempat_lahir'      => 'required|string|max:255',
            'tanggal_lahir'     => 'required|date|before:today',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'agama'             => 'required|in:Islam',
            'asal_sekolah'      => 'nullable|string|max:255',
            'alamat_lengkap'    => 'required|string',
            'anak_ke'           => 'required|integer|min:1',
            'status_keluarga'   => 'required|in:Anak kandung,Anak angkat',
            'kewarganegaraan'   => 'required|string|max:255',

            'nama_ayah'         => 'required|string|max:255',
            'nik_ayah'          => 'required|string|size:16',
            'pendidikan_ayah'   => 'required|string|max:255',
            'pekerjaan_ayah'    => 'required|string|max:255',
            'penghasilan_ayah'  => 'required|string|max:255',

            'nama_ibu'         => 'required|string|max:255',
            'nik_ibu'          => 'required|string|size:16',
            'pendidikan_ibu'   => 'required|string|max:255',
            'pekerjaan_ibu'    => 'required|string|max:255',
            'penghasilan_ibu'  => 'required|string|max:255',

            'nomor_telepon'    => 'required|string|min:10|max:15',
            'alamat_orang_tua' => 'nullable|string',

            'akta_kelahiran'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload untuk akta kelahiran
        if ($request->hasFile('akta_kelahiran')) {
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($registration->akta_kelahiran)) {
            Storage::disk('public')->delete($registration->akta_kelahiran);
            }
            $validated['akta_kelahiran'] = $request->file('akta_kelahiran')->store('ppdb/akta', 'public');
        }

        // Handle file upload untuk kartu keluarga
        if ($request->hasFile('kartu_keluarga')) {
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($registration->kartu_keluarga)) {
            Storage::disk('public')->delete($registration->kartu_keluarga);
            }
            $validated['kartu_keluarga'] = $request->file('kartu_keluarga')->store('ppdb/kk', 'public');
        }

        // Set status menjadi pending setelah update
        $validated['status'] = 'pending';
        $validated['catatan_admin'] = null;

        $registration->update($validated);

        return redirect()->route('ppdb.index')->with('success', 'Data pendaftaran berhasil diperbarui dan menunggu verifikasi kembali');
    }

    public function checkRegistration(Request $request)
    {
        $request->validate([
            'search_value' => 'required|string|min:3|max:20'
        ]);

        $searchValue = $request->input('search_value');

        // Sanitize input - hanya izinkan angka
        $searchValue = preg_replace('/[^0-9]/', '', $searchValue);

        if (empty($searchValue)) {
            return response()->json(['found' => false]);
        }

        $registration = PpdbRegistration::where('nik', $searchValue)
            ->orWhere('nisn', $searchValue)
            ->first();

        if ($registration) {
            return response()->json([
                'found' => true,
                'data' => [
                    'id' => $registration->id,
                    'nama_lengkap' => $registration->nama_lengkap,
                    'status' => $registration->getStatusLabel(),
                    'status_value' => $registration->status,
                    'created_at' => $registration->created_at->format('d-m-Y H:i'),
                ]
            ]);
        }

        return response()->json(['found' => false]);
    }

    public function create()
    {
        return view('front.ppdb.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Student Data
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|unique:ppdb_registrations,nik|size:16',
            'nisn' => 'nullable|string|size:10|unique:ppdb_registrations,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam',
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

            // Files
            'akta_kelahiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nik.unique' => 'NIK sudah terdaftar sebelumnya',
            'nisn.unique' => 'NISN sudah terdaftar sebelumnya',
            'nik.size' => 'NIK harus 16 digit',
            'nik_ayah.size' => 'NIK Ayah harus 16 digit',
            'nik_ibu.size' => 'NIK Ibu harus 16 digit',
            'nisn.size' => 'NISN harus 10 digit',
            'nomor_telepon.min' => 'Nomor telepon minimal 10 digit',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 digit',
            'akta_kelahiran.required' => 'Scan akta kelahiran harus diunggah',
            'kartu_keluarga.required' => 'Scan kartu keluarga harus diunggah',
        ]);

        // Upload files
        $aktaPath = $request->file('akta_kelahiran')->store('ppdb/akta', 'public');
        $kkPath = $request->file('kartu_keluarga')->store('ppdb/kk', 'public');

        $validated['akta_kelahiran'] = $aktaPath;
        $validated['kartu_keluarga'] = $kkPath;

        PpdbRegistration::create($validated);

        return redirect()->route('ppdb.success')->with('success', 'Pendaftaran berhasil! Silahkan tunggu verifikasi dari pihak sekolah.');
    }

    public function success()
    {
        return view('front.ppdb.success');
    }

    // Admin Pages
    public function adminIndex()
    {
        $registrations = PpdbRegistration::orderBy('created_at', 'desc')->paginate(15);
        return view('back.ppdb.index', compact('registrations'));
    }

    public function adminShow($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('back.ppdb.show', compact('registration'));
    }

    public function adminEdit($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        return view('back.ppdb.edit', compact('registration'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $registration = PpdbRegistration::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|unique:ppdb_registrations,nik,' . $id . '|size:16',
            'nisn' => 'nullable|string|size:10|unique:ppdb_registrations,nisn,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam',
            'asal_sekolah' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'anak_ke' => 'required|integer|min:1',
            'status_keluarga' => 'required|in:Anak kandung,Anak angkat',
            'kewarganegaraan' => 'required|string|max:255',

            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|string|size:16',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',

            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|string|size:16',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',

            'nomor_telepon' => 'required|string|min:10|max:15',
            'alamat_orang_tua' => 'nullable|string',

            'akta_kelahiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload untuk akta kelahiran
        if ($request->hasFile('akta_kelahiran')) {
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($registration->akta_kelahiran)) {
            Storage::disk('public')->delete($registration->akta_kelahiran);
            }
            $validated['akta_kelahiran'] = $request->file('akta_kelahiran')->store('ppdb/akta', 'public');
        }

        // Handle file upload untuk kartu keluarga
        if ($request->hasFile('kartu_keluarga')) {
            // Hapus file lama jika ada
            if (Storage::disk('public')->exists($registration->kartu_keluarga)) {
            Storage::disk('public')->delete($registration->kartu_keluarga);
            }
            $validated['kartu_keluarga'] = $request->file('kartu_keluarga')->store('ppdb/kk', 'public');
        }

        // Set status menjadi pending setelah update
        $validated['status'] = 'pending';
        $validated['catatan_admin'] = null;

        $registration->update($validated);

        return redirect()->route('ppdb.admin.index')->with('success', 'Data pendaftaran berhasil diperbarui dan menunggu verifikasi kembali');
    }

    public function approve($id)
    {
        $registration = PpdbRegistration::findOrFail($id);
        $registration->update(['status' => 'approved']);

        return back()->with('success', 'Pendaftaran diterima');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string|min:10'
        ]);

        $registration = PpdbRegistration::findOrFail($id);
        $registration->update([
            'status' => 'rejected',
            'catatan_admin' => $request->input('catatan_admin')
        ]);

        return back()->with('success', 'Pendaftaran ditolak');
    }

    public function destroy($id)
    {
        $registration = PpdbRegistration::findOrFail($id);

        // Delete uploaded files
        if (Storage::disk('public')->exists($registration->akta_kelahiran)) {
            Storage::disk('public')->delete($registration->akta_kelahiran);
        }
        if (Storage::disk('public')->exists($registration->kartu_keluarga)) {
            Storage::disk('public')->delete($registration->kartu_keluarga);
        }

        $registration->delete();

        return redirect()->route('ppdb.admin.index')->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new PpdbRegistrationExport, 'ppdb-registrations-' . date('Y-m-d') . '.xlsx');
    }
}
