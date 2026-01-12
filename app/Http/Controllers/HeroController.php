<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of heroes.
     */
    public function index()
    {
        $heroes = Hero::all();
        return view('back.hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new hero.
     */
    public function create()
    {
        return view('back.hero.create');
    }

    /**
     * Show the form for editing the specified hero.
     */
    public function edit(Hero $hero)
    {
        return view('back.hero.edit', compact('hero'));
    }

    /**
     * Store a newly created hero in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'small_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'is_active' => 'sometimes|boolean',
        ]);

        // Handle file upload with compression
        if ($request->hasFile('image')) {
            $validated['image'] = $this->fileUploadService->upload(
                $request->file('image'),
                'heroes'
            );
        }

        // Normalize is_active
        $validated['is_active'] = $request->boolean('is_active');

        Hero::create($validated);

        return redirect()
            ->route('hero.index')
            ->with('success', 'Hero berhasil ditambahkan.');
    }

    /**
     * Update the specified hero in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'small_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'is_active' => 'sometimes|boolean',
        ]);

        // Handle file upload with compression (replace old file)
        if ($request->hasFile('image')) {
            $validated['image'] = $this->fileUploadService->replace(
                $request->file('image'),
                $hero->image,
                'heroes'
            );
        }

        // Normalize is_active
        $validated['is_active'] = $request->boolean('is_active');

        $hero->update($validated);

        return redirect()
            ->route('hero.index')
            ->with('success', 'Hero berhasil diperbarui.');
    }

    /**
     * Remove the specified hero from storage.
     */
    public function destroy(Hero $hero)
    {
        // Delete the image file
        $this->fileUploadService->delete($hero->image);

        $hero->delete();

        return redirect()
            ->route('hero.index')
            ->with('success', 'Hero berhasil dihapus.');
    }
}
