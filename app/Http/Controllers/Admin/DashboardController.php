<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Reference;
use App\Models\Testimonial;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'blog_posts' => Article::count(),
            'published_posts' => Article::where('status', true)->count(),
            'draft_posts' => Article::where('status', false)->count(),
            'testimonials' => Testimonial::count(),
            'galleries' => Gallery::count(),
            'products' => Product::count(),
            'projects' => Reference::count(),
            'faqs' => class_exists(Faq::class) ? Faq::count() : 0,
        ];

        $recent_posts = Article::latest()->take(5)->get();
        $recent_testimonials = Testimonial::latest()->take(5)->get();
        $recent_galleries = Gallery::latest()->take(5)->get();
        $recent_products = Product::latest()->take(5)->get();
        $recent_projects = Reference::with('images')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'stats',
            'recent_posts',
            'recent_testimonials',
            'recent_galleries',
            'recent_products',
            'recent_projects'
        ));
    }
}
