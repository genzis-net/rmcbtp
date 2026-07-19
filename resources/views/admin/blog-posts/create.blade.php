@extends('admin.layouts.app')

@section('title', isset($blog_post) ? 'Edit Post' : 'New Post')
@section('heading', isset($blog_post) ? 'Edit post' : 'Create post')
@section('subheading', 'English and French content for the news section')

@php
    $locale = app()->getLocale();
    $post = $blog_post ?? null;
@endphp

@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form admin-form--wide" method="POST" enctype="multipart/form-data"
          action="{{ $post ? route('admin.blog-posts.update', ['language' => $locale, 'blog_post' => $post->id]) : route('admin.blog-posts.store', ['language' => $locale]) }}">
        @csrf
        @if($post) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Titles</h3>
                <p>Keep both languages ready for the public site switcher.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="title_en">Title (EN)</label>
                    <input id="title_en" name="title_en" value="{{ old('title_en', $post->title_en ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="title_fr">Title (FR)</label>
                    <input id="title_fr" name="title_fr" value="{{ old('title_fr', $post->title_fr ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Content</h3>
                <p>Main article body in English and French.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="content_en">Content (EN)</label>
                    <textarea id="content_en" name="content_en" required>{{ old('content_en', $post->content_en ?? '') }}</textarea>
                </div>
                <div class="genzis-field full">
                    <label for="content_fr">Content (FR)</label>
                    <textarea id="content_fr" name="content_fr" required>{{ old('content_fr', $post->content_fr ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Publishing</h3>
                <p>Cover image and publish state.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="cover">Cover image</label>
                    <input id="cover" type="file" name="cover" accept="image/*">
                </div>
                <div class="genzis-field">
                    <label class="genzis-check" for="status">
                        <input id="status" type="checkbox" name="status" value="1" {{ old('status', $post->status ?? false) ? 'checked' : '' }}>
                        <span>Published <small>Visible on the public website</small></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.blog-posts.index', ['language' => $locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">{{ $post ? 'Update post' : 'Create post' }}</button>
        </div>
    </form>
</section>
@endsection
