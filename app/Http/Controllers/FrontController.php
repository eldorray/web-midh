<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Feature;
use App\Models\VisiMisi;
use App\Models\Teacher;
use App\Models\Blog;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $heroes = Hero::where('is_active', true)->first();
        $features = Feature::all();
        $visiMisis = VisiMisi::all();
        $teachers = Teacher::take(4)->get();
        $blogs = Blog::where('is_published', true)->latest()->take(6)->get();

        return view('front.index', compact('heroes', 'features', 'visiMisis', 'teachers', 'blogs'));
    }

    /**
     * Display the blog list page with search and tag filtering.
     */
    public function blogList(Request $request)
    {
        $query = Blog::where('is_published', true);

        // Handle search
        if ($request->filled('search')) {
            $searchQuery = $request->input('search');
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', '%' . $searchQuery . '%')
                  ->orWhere('content', 'like', '%' . $searchQuery . '%');
            });
        }

        $blogs = $query->latest()->paginate(3);

        // Collect all unique tags
        $collectTags = $this->collectUniqueTags($blogs);

        return view('front.partials.blog-list', compact('blogs', 'collectTags'));
    }

    /**
     * Display the teacher list page with search.
     */
    public function teacherList(Request $request)
    {
        $query = Teacher::query();
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('subject', 'like', '%' . $searchQuery . '%');
        }

        $teachers = $query->paginate(8);

        return view('front.partials.teacher-list', compact('teachers', 'searchQuery'));
    }

    /**
     * Display a single blog post.
     */
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Generate proper thumbnail URL
        $thumbnail = $this->getThumbnailUrl($blog->thumbnail);

        return view('front.partials.blog-detail', compact('blog', 'thumbnail'));
    }

    /**
     * Display the about us page.
     */
    public function aboutUs()
    {
        $visiMisis = VisiMisi::all();
        return view('front.partials.about', compact('visiMisis'));
    }

    /**
     * Display the contact us page.
     */
    public function contactUs()
    {
        return view('front.partials.contact');
    }

    /**
     * Extract unique tags from blog posts.
     */
    private function collectUniqueTags($blogs): array
    {
        $collectTags = [];

        foreach ($blogs as $blog) {
            if (empty($blog->tags)) {
                continue;
            }

            $tags = explode(',', $blog->tags);
            foreach ($tags as $tag) {
                $trimmedTag = trim($tag);
                if (!empty($trimmedTag) && !in_array($trimmedTag, $collectTags)) {
                    $collectTags[] = $trimmedTag;
                }
            }
        }

        return $collectTags;
    }

    /**
     * Get proper thumbnail URL.
     */
    private function getThumbnailUrl(?string $thumbnail): ?string
    {
        if (empty($thumbnail)) {
            return null;
        }

        if (filter_var($thumbnail, FILTER_VALIDATE_URL)) {
            return $thumbnail;
        }

        return asset('storage/' . $thumbnail);
    }
}
