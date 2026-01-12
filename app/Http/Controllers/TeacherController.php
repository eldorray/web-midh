<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of teachers.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('back.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('back.teacher.create');
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        // Handle photo upload with compression
        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->fileUploadService->upload(
                $request->file('photo'),
                'teachers'
            );
        }

        Teacher::create($validated);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit(Teacher $teacher)
    {
        return view('back.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        // Handle photo upload with compression (replace old file)
        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->fileUploadService->replace(
                $request->file('photo'),
                $teacher->photo,
                'teachers'
            );
        }

        $teacher->update($validated);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Delete the photo file
        $this->fileUploadService->delete($teacher->photo);

        $teacher->delete();

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Guru berhasil dihapus.');
    }
}
