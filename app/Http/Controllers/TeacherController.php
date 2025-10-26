<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('back.teacher.index', compact('teachers'));
    }


    public function create()
    {
        return view('back.teacher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'name'      => 'required|string|max:255',
            'subject'   => 'required|string|max:255',
            'instagram' => 'required|string|max:255|unique:teachers,instagram',
            'facebook'  => 'required|string|max:255|unique:teachers,facebook',
            'twitter'   => 'required|string|max:255|unique:teachers,twitter',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create([
            'photo'     => $path,
            'name'      => $validated['name'],
            'subject'   => $validated['subject'],
            'instagram' => $validated['instagram'],
            'facebook'  => $validated['facebook'],
            'twitter'   => $validated['twitter'],
        ]);

        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('back.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'name'      => 'required|string|max:255',
            'subject'   => 'required|string|max:255',
            'instagram' => 'required|string|max:255|unique:teachers,instagram,' . $teacher->id,
            'facebook'  => 'required|string|max:255|unique:teachers,facebook,' . $teacher->id,
            'twitter'   => 'required|string|max:255|unique:teachers,twitter,' . $teacher->id,
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teachers', 'public');
            $teacher->photo = $path;
        }

        $teacher->name = $validated['name'];
        $teacher->subject = $validated['subject'];
        $teacher->instagram = $validated['instagram'];
        $teacher->facebook = $validated['facebook'];
        $teacher->twitter = $validated['twitter'];
        $teacher->save();

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
