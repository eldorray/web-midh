<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisis = VisiMisi::all();
        return view('back.visimisi.index', compact('visiMisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just show the create form. Do not pass model collections here.
        return view('back.visimisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            // Validate incoming data. misi/tujuan may come from JS editor; accept nullable and coerce below.
            $validatedData = $request->validate([
                'visi' => 'required|string',
                'misi' => 'nullable|string',
                'tujuan' => 'nullable|string',
                'motto' => 'nullable|string',
                'sejarah' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload (optional). Store on public disk so asset('storage/...') works.
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('visimisi', 'public');
            }

            // Ensure misi and tujuan keys exist (defaults to empty string)
            $misi = $request->input('misi', $validatedData['misi'] ?? '');
            $tujuan = $request->input('tujuan', $validatedData['tujuan'] ?? '');

            VisiMisi::create([
                'visi' => $validatedData['visi'],
                'misi' => $misi,
                'tujuan' => $tujuan,
                'motto' => $validatedData['motto'] ?? '',
                'sejarah' => $validatedData['sejarah'] ?? '',
                'image' => $path,
            ]);

        return redirect()->route('visiMisi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        return view('back.visimisi.edit', compact('visiMisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'visi' => 'required|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'motto' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload (optional)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('visimisi', 'public');
            $visiMisi->image = $path;
        }

        // Ensure misi and tujuan keys exist (defaults to empty string)
        $misi = $request->input('misi', $validatedData['misi'] ?? '');
        $tujuan = $request->input('tujuan', $validatedData['tujuan'] ?? '');

        // Update the VisiMisi record
        $visiMisi->visi = $validatedData['visi'];
        $visiMisi->misi = $misi;
        $visiMisi->tujuan = $tujuan;
        $visiMisi->motto = $validatedData['motto'] ?? '';
        $visiMisi->sejarah = $validatedData['sejarah'] ?? '';
        $visiMisi->save();

        return redirect()->route('visiMisi.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();
        return redirect()->route('visiMisi.index')->with('success', 'Data berhasil dihapus!');
    }
}
