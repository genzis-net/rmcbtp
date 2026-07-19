@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $catalogSlug = $product->catalogSlug();
    $banner = $catalog === 'sims_decor' ? '/assets/images/banner/11.jpg' : '/assets/images/banner/13.jpg';
    $productName = $product->localizedName();
    $productDesc = Str::limit(strip_tags($product->localizedDescription() ?? $productName), 160);
    $canonical = route('catalog.show', ['language' => $locale, 'catalog' => $catalogSlug, 'product' => $product]);
    $quoteUrl = route('contact', [
        'language' => $locale,
        'product' => $productName,
        'ref' => $product->uniq_id,
        'catalog' => $catalogLabel,
    ]);
@endphp

@section('headerz')
    <title>{{ $productName }} | {{ $catalogLabel }}</title>
    <meta name="description" content="{{ $productDesc }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <meta property="og:title" content="{{ $productName }} | {{ $catalogLabel }}" />
    <meta property="og:description" content="{{ $productDesc }}" />
    <meta property="og:url" content="{{ $canonical }}" />
    <meta property="og:image" content="{{ url($product->imageUrl()) }}" />
    <meta property="og:type" content="product" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/catalog.css') }}">
@endsection

@section('content')
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url({{ $banner }});">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">{{ $productName }}</h2>
                </div>
            </div>
            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', $locale) }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route($landingRoute, $locale) }}">{{ $catalogLabel }}</a></li>
                    <li><a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]) }}">{{ __('Catalog') }}</a></li>
                    <li>{{ $productName }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="catalog-page section-full p-tb80 bg-white inner-page-padding">
    <div class="container">
        <div class="catalog-detail">
            <div class="catalog-detail__media">
                <img id="catalog-main-image" src="{{ $product->imageUrl() }}" alt="{{ $productName }}">
                @if($product->images->count() > 1)
                    <div class="catalog-detail__thumbs" role="list">
                        @foreach($product->images as $image)
                            <button type="button"
                                    class="catalog-detail__thumb{{ $loop->first ? ' is-active' : '' }}"
                                    data-full="{{ $image->url() }}"
                                    aria-label="{{ __('View image') }} {{ $loop->iteration }}">
                                <img src="{{ $image->url() }}" alt="{{ $productName }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="catalog-detail__info">
                <p class="catalog-detail__catalog">{{ $catalogLabel }}</p>
                <h1>{{ $productName }}</h1>
                <p class="catalog-detail__price">{{ $product->formattedPrice() }}</p>

                <dl class="catalog-detail__meta">
                    @if($product->uniq_id)
                        <div><dt>{{ __('Reference') }}</dt><dd>{{ $product->uniq_id }}</dd></div>
                    @endif
                    @if($product->subcategory)
                        <div><dt>{{ __('Category') }}</dt><dd>{{ $product->subcategory->localizedName() }}</dd></div>
                    @endif
                    @if($product->material)
                        <div><dt>{{ __('Material') }}</dt><dd>{{ $product->material->localizedName() }}</dd></div>
                    @endif
                </dl>

                @if($product->localizedDescription())
                    <div class="catalog-detail__desc">
                        {!! nl2br(e($product->localizedDescription())) !!}
                    </div>
                @endif

                <div class="catalog-detail__actions">
                    <a class="site-button btn-effect" href="{{ $quoteUrl }}">{{ __('Request a Quote') }}</a>
                    <a class="site-button-secondry btn-effect" href="{{ route('catalog.index', ['language' => $locale, 'catalog' => $catalogSlug]) }}">{{ __('Back to catalog') }}</a>
                </div>
            </div>
        </div>

        @if($related->isNotEmpty())
            <div class="catalog-related">
                <h3>{{ __('Related products') }}</h3>
                <div class="catalog-grid">
                    @foreach($related as $item)
                        @include('partials.catalog-card', ['product' => $item, 'catalog' => $catalog])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@section('scripts')
<script>
(function () {
  var main = document.getElementById('catalog-main-image');
  var thumbs = document.querySelectorAll('.catalog-detail__thumb');
  if (!main || !thumbs.length) return;

  thumbs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var full = btn.getAttribute('data-full');
      if (!full) return;
      main.src = full;
      thumbs.forEach(function (el) { el.classList.remove('is-active'); });
      btn.classList.add('is-active');
    });
  });
})();
</script>
@endsection
