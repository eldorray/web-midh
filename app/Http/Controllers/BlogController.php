<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('back.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|max:10240',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        // Handle is_published checkbox
        $validated['is_published'] = $request->has('is_published') ? true : false;

        // Handle rich text content - provide fallback
        if (empty($validated['content'])) {
            $validated['content'] = $request->input('content', '');
        }

        Log::info('Blog store request data:', [
            'all' => $request->all(),
            'content' => $request->input('content'),
            'validated' => $validated
        ]);

        Blog::create($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('back.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('back.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|max:10240',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        // Handle is_published checkbox
        $validated['is_published'] = $request->has('is_published') ? true : false;

        // Handle rich text content - provide fallback
        if (empty($validated['content'])) {
            $validated['content'] = $request->input('content', '');
        }

        $blog->update($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }
}
