<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of visi misi.
     */
    public function index()
    {
        $visiMisis = VisiMisi::all();
        return view('back.visimisi.index', compact('visiMisis'));
    }

    /**
     * Show the form for creating a new visi misi.
     */
    public function create()
    {
        return view('back.visimisi.create');
    }

    /**
     * Store a newly created visi misi in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'visi' => 'required|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'motto' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:9048',
        ]);

        // Handle image upload with compression
        if ($request->hasFile('image')) {
            $validated['image'] = $this->fileUploadService->upload(
                $request->file('image'),
                'visimisi'
            );
        }

        // Ensure misi and tujuan have default values
        $validated['misi'] = $request->input('misi', $validated['misi'] ?? '');
        $validated['tujuan'] = $request->input('tujuan', $validated['tujuan'] ?? '');
        $validated['motto'] = $validated['motto'] ?? '';
        $validated['sejarah'] = $validated['sejarah'] ?? '';

        VisiMisi::create($validated);

        return redirect()
            ->route('visiMisi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified visi misi.
     */
    public function edit(VisiMisi $visiMisi)
    {
        return view('back.visimisi.edit', compact('visiMisi'));
    }

    /**
     * Update the specified visi misi in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $validated = $request->validate([
            'visi' => 'required|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'motto' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:9048',
        ]);

        // Handle image upload with compression (replace old file)
        if ($request->hasFile('image')) {
            $validated['image'] = $this->fileUploadService->replace(
                $request->file('image'),
                $visiMisi->image,
                'visimisi'
            );
        }

        // Ensure misi and tujuan have default values
        $validated['misi'] = $request->input('misi', $validated['misi'] ?? '');
        $validated['tujuan'] = $request->input('tujuan', $validated['tujuan'] ?? '');
        $validated['motto'] = $validated['motto'] ?? '';
        $validated['sejarah'] = $validated['sejarah'] ?? '';

        $visiMisi->update($validated);

        return redirect()
            ->route('visiMisi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified visi misi from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        // Delete the image file
        $this->fileUploadService->delete($visiMisi->image);

        $visiMisi->delete();

        return redirect()
            ->route('visiMisi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
