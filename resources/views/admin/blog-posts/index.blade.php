@extends('admin.layouts.app')

@section('title', 'Blog Posts')
@section('heading', 'Blog Posts')
@section('subheading', 'Publish and manage articles')

@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.blog-posts.create', ['language' => app()->getLocale()]) }}">New post</a>
@endsection

@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>
                            <strong>{{ $post->title_en ?: $post->title_fr }}</strong>
                            <div class="admin-muted">{{ Str::limit(strip_tags($post->content_en ?: $post->content_fr), 90) }}</div>
                        </td>
                        <td>
                            <span class="genzis-delta {{ $post->status ? 'genzis-delta--up' : 'genzis-delta--down' }}">
                                {{ $post->status ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $post->created_at?->format('M d, Y') }}</td>
                        <td>
                            <div class="admin-actions-inline">
                                <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.blog-posts.show', ['language' => app()->getLocale(), 'blog_post' => $post->id]) }}">View</a>
                                <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.blog-posts.edit', ['language' => app()->getLocale(), 'blog_post' => $post->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.blog-posts.destroy', ['language' => app()->getLocale(), 'blog_post' => $post->id]) }}" onsubmit="return confirm('Delete this post?')">
                                    @csrf @method('DELETE')
                                    <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="admin-muted">No blog posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:16px">{{ $posts->withQueryString()->links() }}</div>
</section>
@endsection
