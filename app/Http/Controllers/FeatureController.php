<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function index()
    {
        $features = Feature::all();
        return view('back.features.index', compact('features'));
    }

    public function create()
    {
        return view('back.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('features', 'public');
            $validated['icon'] = $iconPath;
        }

        Feature::create($validated);

        return redirect()->route('feature.index')->with('success', 'Feature created successfully.');
    }

    public function edit(Feature $feature)
    {
        return view('back.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'icon'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('features', 'public');
            $validated['icon'] = $iconPath;
        }

        $feature->update($validated);

        return redirect()->route('feature.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('feature.index')->with('success', 'Feature deleted successfully.');
    }
}
