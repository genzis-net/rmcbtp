@php
    $locale = app()->getLocale();
    $productName = $product->localizedName();
    $href = route('catalog.show', [
        'language' => $locale,
        'catalog' => $product->catalogSlug(),
        'product' => $product,
    ]);
@endphp
<article class="catalog-card">
    @if($product->is_featured)
        <span class="catalog-card__badge">{{ __('Featured') }}</span>
    @endif
    <a class="catalog-card__media" href="{{ $href }}">
        <img src="{{ $product->imageUrl() }}" alt="{{ $productName }}" loading="lazy">
    </a>
    <div class="catalog-card__body">
        @if($product->subcategory)
            <p class="catalog-card__meta">{{ $product->subcategory->localizedName() }}</p>
        @endif
        <h3 class="catalog-card__title">
            <a href="{{ $href }}">{{ $productName }}</a>
        </h3>
        <p class="catalog-card__price">{{ $product->formattedPrice() }}</p>
        <a class="site-button btn-effect catalog-card__cta" href="{{ $href }}">{{ __('View details') }}</a>
    </div>
</article>
