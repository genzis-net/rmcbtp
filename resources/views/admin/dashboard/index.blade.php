@extends('admin.layouts.app')

@section('title', __('Dashboard'))
@section('heading', __('Hello, :name!', ['name' => auth()->user()->name ?? __('Admin')]))
@section('subheading', __('Explore information and activity about your content'))

@php
    $locale = app()->getLocale();
    $publishedRate = $stats['blog_posts'] > 0
        ? (int) round(($stats['published_posts'] / $stats['blog_posts']) * 100)
        : 0;
    $gaugeC = 2 * M_PI * 52;
    $gaugeDash = ($publishedRate / 100) * ($gaugeC * 0.75);
@endphp

@section('content')
<div class="admin-stats">
    <a class="admin-stat" href="{{ route('admin.blog-posts.index', ['language' => $locale]) }}">
        <div>
            <div class="admin-stat__label">{{ __('Blog posts') }}</div>
            <div class="admin-stat__value">{{ $stats['blog_posts'] }}</div>
        </div>
    </a>
    <a class="admin-stat" href="{{ route('admin.projects.index', ['language' => $locale]) }}">
        <div>
            <div class="admin-stat__label">{{ __('Projects') }}</div>
            <div class="admin-stat__value">{{ $stats['projects'] ?? 0 }}</div>
        </div>
    </a>
    <a class="admin-stat" href="{{ route('admin.galleries.index', ['language' => $locale]) }}">
        <div>
            <div class="admin-stat__label">{{ __('Galleries') }}</div>
            <div class="admin-stat__value">{{ $stats['galleries'] }}</div>
        </div>
    </a>
    <a class="admin-stat is-active" href="{{ route('admin.products.index', ['language' => $locale]) }}">
        <div>
            <div class="admin-stat__label">{{ __('Products') }}</div>
            <div class="admin-stat__value">{{ $stats['products'] }}</div>
        </div>
    </a>
</div>

<div class="admin-grid admin-grid--mid">
    <section class="genzis-card admin-panel">
        <div class="admin-panel__head">
            <h2 class="admin-panel__title">{{ __('Recent posts') }}</h2>
            <span class="genzis-badge">{{ __(':count published', ['count' => $stats['published_posts']]) }}</span>
            <div style="flex:1"></div>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.blog-posts.index', ['language' => $locale]) }}">{{ __('View all') }}</a>
        </div>
        @if($recent_posts->count())
            <div class="admin-list">
                @foreach($recent_posts as $post)
                    <div class="admin-list__row">
                        <span class="admin-list__bar {{ $post->status ? '' : 'admin-list__bar--warn' }}"></span>
                        <div class="admin-list__body">
                            <strong>{{ $post->title_en ?: $post->title_fr ?: __('Untitled') }}</strong>
                            <span>{{ $post->created_at?->diffForHumans() }}</span>
                        </div>
                        <span class="genzis-delta {{ $post->status ? 'genzis-delta--up' : 'genzis-delta--down' }}">
                            {{ $post->status ? __('Live') : __('Draft') }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="admin-empty">
                <p class="admin-empty__title">{{ __('No blog posts yet') }}</p>
                <p class="admin-empty__text">{{ __('Create your first post to start publishing.') }}</p>
                <a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.blog-posts.create', ['language' => $locale]) }}">{{ __('New post') }}</a>
            </div>
        @endif
    </section>

    <section class="genzis-card admin-panel">
        <h2 class="admin-panel__title">{{ __('Publishing health') }}</h2>
        <div class="admin-panel__meta">{{ __('Share of posts currently live') }}</div>
        <div style="font-family:var(--font-display);font-size:30px;font-weight:700;color:var(--teal);margin-top:6px">
            {{ $stats['published_posts'] }} / {{ $stats['blog_posts'] }}
        </div>
        <div class="admin-gauge" aria-hidden="true">
            <svg width="148" height="148" viewBox="0 0 148 148" style="transform:rotate(135deg)">
                <circle cx="74" cy="74" r="52" fill="none" stroke="var(--paper-deep)" stroke-width="16" stroke-linecap="round" stroke-dasharray="{{ $gaugeC * 0.75 }} {{ $gaugeC }}" />
                <circle cx="74" cy="74" r="52" fill="none" stroke="var(--teal)" stroke-width="16" stroke-linecap="round" stroke-dasharray="{{ $gaugeDash }} {{ $gaugeC }}" />
            </svg>
            <div class="admin-gauge__value">{{ $publishedRate }}%</div>
        </div>
    </section>

    <section class="genzis-card admin-panel">
        <div class="admin-panel__head">
            <h2 class="admin-panel__title">{{ __('Recent projects') }}</h2>
            <div style="flex:1"></div>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.index', ['language' => $locale]) }}">{{ __('View all') }}</a>
        </div>
        <div class="admin-list">
            @forelse($recent_projects as $project)
                <div class="admin-list__row">
                    <span class="admin-list__bar"></span>
                    <div class="admin-list__body">
                        <strong>{{ $project->title_en ?: $project->title_fr }}</strong>
                        <span>{{ $project->client }} · {{ $project->year }}</span>
                    </div>
                    <span class="genzis-delta genzis-delta--up">{{ $project->images->count() }} {{ __('img') }}</span>
                </div>
            @empty
                <div class="admin-empty">
                    <p class="admin-empty__title">{{ __('No projects yet') }}</p>
                    <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.create', ['language' => $locale]) }}">{{ __('New project') }}</a>
                </div>
            @endforelse
        </div>
    </section>
</div>

<div class="admin-grid admin-grid--bottom">
    <section class="genzis-card admin-panel">
        <h2 class="admin-panel__title">{{ __('Quick actions') }}</h2>
        <div class="admin-actions">
            <a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.blog-posts.create', ['language' => $locale]) }}">{{ __('New post') }}</a>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.create', ['language' => $locale]) }}">{{ __('New project') }}</a>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.galleries.create', ['language' => $locale]) }}">{{ __('New gallery') }}</a>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.create', ['language' => $locale]) }}">{{ __('New product') }}</a>
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.faqs.create', ['language' => $locale]) }}">{{ __('New FAQ') }}</a>
        </div>
    </section>

    <section class="genzis-card admin-panel">
        <h2 class="admin-panel__title" style="margin-bottom:16px">{{ __('Testimonials') }}</h2>
        <div class="admin-list">
            @forelse($recent_testimonials as $item)
                <div class="admin-list__row">
                    <span class="admin-list__bar"></span>
                    <div class="admin-list__body">
                        <strong>{{ $item->client }}</strong>
                        <span>{{ $item->created_at?->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="admin-empty">
                    <p class="admin-empty__title">{{ __('No testimonials') }}</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="genzis-card admin-panel" style="align-items:center;text-align:center">
        <h2 class="admin-panel__title" style="margin-top:8px">{{ __('Settings') }}</h2>
        <div class="admin-panel__meta">{{ __(':count FAQs · contact & brand', ['count' => $stats['faqs'] ?? 0]) }}</div>
        <a class="genzis-btn genzis-btn--primary genzis-btn--sm" style="margin-top:18px" href="{{ route('admin.settings', ['language' => $locale]) }}">{{ __('Open settings') }}</a>
    </section>
</div>
@endsection
