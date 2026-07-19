<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogPostRequest;
use App\Http\Requests\Admin\UpdateBlogPostRequest;
use App\Models\Article;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'blog_post');
    }

    public function index()
    {
        $posts = Article::latest()->paginate(10);

        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog-posts.create');
    }

    public function store(StoreBlogPostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title_en']);
        $data['user_id'] = auth()->id();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('blog-covers', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.blog-posts.index', ['language' => app()->getLocale()])
            ->with('success', __('Blog post created successfully.'));
    }

    public function show(Article $blog_post)
    {
        return view('admin.blog-posts.show', compact('blog_post'));
    }

    public function edit(Article $blog_post)
    {
        return view('admin.blog-posts.edit', compact('blog_post'));
    }

    public function update(UpdateBlogPostRequest $request, Article $blog_post)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title_en']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('blog-covers', 'public');
        }

        $blog_post->update($data);

        return redirect()->route('admin.blog-posts.index', ['language' => app()->getLocale()])
            ->with('success', __('Blog post updated successfully.'));
    }

    public function destroy(Article $blog_post)
    {
        $blog_post->delete();

        return redirect()->route('admin.blog-posts.index', ['language' => app()->getLocale()])
            ->with('success', __('Blog post deleted successfully.'));
    }

    public function publish(Article $blog_post)
    {
        $this->authorize('update', $blog_post);
        $blog_post->update(['status' => true]);

        return redirect()->route('admin.blog-posts.index', ['language' => app()->getLocale()])
            ->with('success', __('Blog post published successfully.'));
    }

    public function unpublish(Article $blog_post)
    {
        $this->authorize('update', $blog_post);
        $blog_post->update(['status' => false]);

        return redirect()->route('admin.blog-posts.index', ['language' => app()->getLocale()])
            ->with('success', __('Blog post unpublished successfully.'));
    }
}
