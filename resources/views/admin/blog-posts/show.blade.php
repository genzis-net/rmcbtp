@extends('admin.layouts.app')
@section('title', 'Post')
@section('heading', $blog_post->title_en ?: $blog_post->title_fr)
@section('subheading', $blog_post->status ? 'Published' : 'Draft')
@section('actions')
<a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.blog-posts.edit', ['language' => app()->getLocale(), 'blog_post' => $blog_post->id]) }}">Edit</a>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    @if($blog_post->cover)
        <img src="{{ asset('storage/'.$blog_post->cover) }}" alt="" style="max-width:100%;border-radius:12px;margin-bottom:16px">
    @endif
    <div class="admin-muted" style="margin-bottom:12px">FR: {{ $blog_post->title_fr }}</div>
    <div>{!! nl2br(e($blog_post->content_en)) !!}</div>
</section>
@endsection
