<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('back.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('back.blog.create');
    }

    /**
     * Store a newly created blog post in storage.
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

        // Handle thumbnail upload with compression
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadService->upload(
                $request->file('thumbnail'),
                'blogs'
            );
        }

        // Handle is_published checkbox
        $validated['is_published'] = $request->boolean('is_published');

        // Handle rich text content - provide fallback
        if (empty($validated['content'])) {
            $validated['content'] = $request->input('content', '');
        }

        Blog::create($validated);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post berhasil dibuat.');
    }

    /**
     * Display the specified blog post.
     */
    public function show(Blog $blog)
    {
        return view('back.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Blog $blog)
    {
        return view('back.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog post in storage.
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

        // Handle thumbnail upload with compression (replace old file)
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadService->replace(
                $request->file('thumbnail'),
                $blog->thumbnail,
                'blogs'
            );
        }

        // Handle is_published checkbox
        $validated['is_published'] = $request->boolean('is_published');

        // Handle rich text content - provide fallback
        if (empty($validated['content'])) {
            $validated['content'] = $request->input('content', '');
        }

        $blog->update($validated);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post berhasil diperbarui.');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete the thumbnail file
        $this->fileUploadService->delete($blog->thumbnail);

        $blog->delete();

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post berhasil dihapus.');
    }
}
