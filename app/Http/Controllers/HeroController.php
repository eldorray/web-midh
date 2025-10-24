<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = \App\Models\Hero::all();
        return view('back.hero.index', compact('heroes'));

    }

    public function create()
    {
        return view('back.hero.create');
    }

    public function edit($id)
    {
        $hero = \App\Models\Hero::findOrFail($id);
        return view('back.hero.edit', compact('hero'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'small_text'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'     => 'sometimes|boolean',
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('heroes', 'public');
            $validated['image'] = $imagePath;
        }

        // Normalize is_active: make sure it's present and boolean
        $validated['is_active'] = $request->has('is_active') ? (bool) $request->input('is_active') : false;

        // Create a new Hero record
        \App\Models\Hero::create($validated);

        return redirect()->route('hero.index')->with('success', 'Hero created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the existing Hero record
        $hero = \App\Models\Hero::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'small_text'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'     => 'sometimes|boolean',
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('heroes', 'public');
            $validated['image'] = $imagePath;
        }

        // Normalize is_active: make sure it's present and boolean
        $validated['is_active'] = $request->has('is_active') ? (bool) $request->input('is_active') : false;

        // Update the Hero record
        $hero->update($validated);

        return redirect()->route('hero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy($id)
    {
        // Find the existing Hero record
        $hero = \App\Models\Hero::findOrFail($id);

        // Delete the Hero record
        $hero->delete();

        return redirect()->route('hero.index')->with('success', 'Hero deleted successfully.');
    }
}
