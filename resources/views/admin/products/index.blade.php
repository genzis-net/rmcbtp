@extends('admin.layouts.app')

@section('title', __('Products'))
@section('heading', __('Products'))
@section('subheading', __('Catalog items for Quincaillerie and Sims Decor'))
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.products.create', ['language'=>app()->getLocale()]) }}">{{ __('New product') }}</a>
@endsection

@section('content')
@php $locale = app()->getLocale(); @endphp
<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <form method="GET" action="{{ route('admin.products.index', ['language'=>$locale]) }}" class="admin-filter-bar">
        <div class="genzis-field">
            <label for="catalog">{{ __('Catalog') }}</label>
            <select id="catalog" name="catalog">
                <option value="">{{ __('All catalogues') }}</option>
                @foreach(\App\Models\Product::CATALOGS as $value => $label)
                    <option value="{{ $value }}" @selected(($catalog ?? '') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="genzis-field">
            <label for="q">{{ __('Search') }}</label>
            <input id="q" type="search" name="q" value="{{ request('q') }}" placeholder="{{ __('Name or reference') }}">
        </div>
        <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">{{ __('Filter') }}</button>
        @if(request()->filled('catalog') || request()->filled('q'))
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.index', ['language'=>$locale]) }}">{{ __('Clear') }}</a>
        @endif
    </form>
</section>

<section class="genzis-card admin-panel">
    @if($products->isEmpty())
        <div class="admin-empty">
            <p class="admin-empty__title">{{ __('No products yet') }}</p>
            <p class="admin-empty__text">{{ __('Add your first catalog item to get started.') }}</p>
            <a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.products.create', ['language'=>$locale]) }}">{{ __('New product') }}</a>
        </div>
    @else
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Catalog') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <strong>{{ $product->localizedName() }}</strong>
                            <div class="admin-muted">{{ $product->uniq_id }}</div>
                        </td>
                        <td>{{ $product->catalogLabel() }}</td>
                        <td>{{ $product->subcategory?->localizedName() ?? '—' }}</td>
                        <td>{{ $product->formattedPrice() }}</td>
                        <td>
                            <span class="genzis-delta {{ $product->is_active ? 'genzis-delta--up' : 'genzis-delta--down' }}">
                                {{ $product->is_active ? __('Active') : __('Hidden') }}
                            </span>
                            @if($product->is_featured)
                                <div class="admin-muted">{{ __('Featured') }}</div>
                            @endif
                        </td>
                        <td>
                            <div class="admin-actions-inline">
                                <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.show', ['language'=>$locale,'product'=>$product]) }}">{{ __('View') }}</a>
                                <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.edit', ['language'=>$locale,'product'=>$product]) }}">{{ __('Edit') }}</a>
                                <form method="POST" action="{{ route('admin.products.destroy', ['language'=>$locale,'product'=>$product]) }}" onsubmit="return confirm(@json(__('Delete this product?')))">
                                    @csrf @method('DELETE')
                                    <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="admin-pagination">{{ $products->links() }}</div>
    @endif
</section>
@endsection
