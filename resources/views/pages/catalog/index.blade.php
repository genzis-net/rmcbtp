@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $catalogSlug = $catalog === 'sims_decor' ? 'sims-decor' : 'quincaillerie';
    $banner = $catalog === 'sims_decor' ? '/assets/images/banner/11.jpg' : '/assets/images/banner/13.jpg';
    $canonical = route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]);
    $metaDesc = __('Browse and filter products from') . ' ' . $catalogLabel;
@endphp

@section('headerz')
    <title>{{ $catalogLabel }} | {{ __('Catalog') }}</title>
    <meta name="description" content="{{ $metaDesc }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <meta property="og:title" content="{{ $catalogLabel }} | {{ __('Catalog') }}" />
    <meta property="og:description" content="{{ $metaDesc }}" />
    <meta property="og:url" content="{{ $canonical }}" />
    <meta property="og:image" content="{{ url($banner) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/catalog.css') }}">
@endsection

@section('content')
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url({{ $banner }});">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">{{ $catalogLabel }} — {{ __('Catalog') }}</h2>
                </div>
            </div>
            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', $locale) }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route($landingRoute, $locale) }}">{{ $catalogLabel }}</a></li>
                    <li>{{ __('Catalog') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="catalog-page section-full p-tb80 bg-white inner-page-padding">
    <div class="container">
        <div class="catalog-layout">
            <aside class="catalog-filters">
                <p class="catalog-filters__title">{{ __('Filters') }}</p>
                <form method="GET" action="{{ route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]) }}">
                    <div class="catalog-filters__block">
                        <label for="q">{{ __('Search') }}</label>
                        <input id="q" type="search" name="q" value="{{ $filters['q'] }}" placeholder="{{ __('Name or reference…') }}">
                    </div>

                    <div class="catalog-filters__block">
                        <label for="cat">{{ __('Category') }}</label>
                        <select id="cat" name="cat">
                            <option value="">{{ __('All categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected($filters['cat'] == $category->id)>
                                    {{ $category->localizedName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="catalog-filters__block">
                        <label for="subcat">{{ __('Subcategory') }}</label>
                        <select id="subcat" name="subcat">
                            <option value="">{{ __('All subcategories') }}</option>
                            @foreach($categories as $category)
                                @foreach($category->subcategories as $subcat)
                                    <option value="{{ $subcat->id }}" @selected($filters['subcat'] == $subcat->id)>
                                        {{ $category->localizedName() }} — {{ $subcat->localizedName() }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    @if($materials->isNotEmpty())
                        <div class="catalog-filters__block">
                            <label for="material">{{ __('Material') }}</label>
                            <select id="material" name="material">
                                <option value="">{{ __('All materials') }}</option>
                                    @foreach($materials as $material)
                                    <option value="{{ $material->id }}" @selected($filters['material'] == $material->id)>
                                        {{ $material->localizedName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="catalog-filters__block">
                        <label for="sort">{{ __('Sort by') }}</label>
                        <select id="sort" name="sort">
                            <option value="latest" @selected($filters['sort'] === 'latest')>{{ __('Newest') }}</option>
                            <option value="name" @selected($filters['sort'] === 'name')>{{ __('Name') }}</option>
                            <option value="price_asc" @selected($filters['sort'] === 'price_asc')>{{ __('Price: low to high') }}</option>
                            <option value="price_desc" @selected($filters['sort'] === 'price_desc')>{{ __('Price: high to low') }}</option>
                        </select>
                    </div>

                    <div class="catalog-filters__actions">
                        <button class="site-button btn-effect" type="submit">{{ __('Apply filters') }}</button>
                        <a class="catalog-filters__reset" href="{{ route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]) }}">{{ __('Clear') }}</a>
                    </div>
                </form>
            </aside>

            <div class="catalog-results">
                <div class="catalog-results__head">
                    <p>{{ trans_choice(':count product|:count products', $products->total(), ['count' => $products->total()]) }}</p>
                    <a href="{{ route($landingRoute, $locale) }}">{{ __('Back to') }} {{ $catalogLabel }}</a>
                </div>

                @if($products->isEmpty())
                    <div class="catalog-empty">
                        <p class="catalog-empty__title">{{ __('Nothing here yet') }}</p>
                        <p>{{ __('No products match your filters.') }}</p>
                        <a class="site-button btn-effect" href="{{ route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]) }}">{{ __('Reset filters') }}</a>
                    </div>
                @else
                    <div class="catalog-grid">
                        @foreach($products as $product)
                            @include('partials.catalog-card', ['product' => $product, 'catalog' => $catalog])
                        @endforeach
                    </div>
                    <div class="catalog-pagination">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
