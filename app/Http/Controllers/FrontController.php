<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $heroes         = \App\Models\Hero::where('is_active', true)->first();
        $features       = \App\Models\Feature::all();
        $visiMisis      = \App\Models\VisiMisi::all();
        $teachers       = \App\Models\Teacher::take(4)->get();
        $blogs          = \App\Models\Blog::where('is_published', true)->latest()->take(6)->get();
        return view('front.index', compact('heroes', 'features', 'visiMisis', 'teachers', 'blogs'));
    }

    public function blogList()
    {
        $blogs = \App\Models\Blog::where('is_published', true)->latest()->paginate(3);
        $collectTags = [];
        foreach ($blogs as $blog) {
            $tags = explode(',', $blog->tags);
            foreach ($tags as $tag) {
                $trimmedTag = trim($tag);
                if (!in_array($trimmedTag, $collectTags) && !empty($trimmedTag)) {
                    $collectTags[] = $trimmedTag;
                }
            }
        }

        $searchQuery = request()->input('search');
        if ($searchQuery) {
            $blogs = \App\Models\Blog::where('is_published', true)
                ->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'like', '%' . $searchQuery . '%')
                          ->orWhere('content', 'like', '%' . $searchQuery . '%');
                })
                ->latest()
                ->paginate(3);
        }
        return view('front.partials.blog-list', compact('blogs', 'collectTags'));
    }

    public function teacherList()
    {
        $teachers = \App\Models\Teacher::paginate(8);
        $searchQuery = request()->input('search');
        if ($searchQuery) {
            $teachers = \App\Models\Teacher::where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('subject', 'like', '%' . $searchQuery . '%')
                ->paginate(8);
        }
        return view('front.partials.teacher-list', compact('teachers', 'searchQuery'));
    }

    public function blogDetail($slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        $thumbnail = $blog->thumbnail ?? null;
                                    if ($thumbnail && !filter_var($thumbnail, FILTER_VALIDATE_URL)) {
                                        $thumbnail = asset($thumbnail);
                                    }
        return view('front.partials.blog-detail', compact('blog', 'thumbnail'));
    }

    public function aboutUs()
    {
        $visiMisis = \App\Models\VisiMisi::all();
        return view('front.partials.about', compact('visiMisis'));
    }

    public function contactUs()
    {
        return view('front.partials.contact');
    }

}
