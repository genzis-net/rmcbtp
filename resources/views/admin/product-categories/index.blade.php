@extends('admin.layouts.app')
@section('title', 'Categories')
@section('heading', 'Product categories')
@section('subheading', 'Cats and subcategories')
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.product-categories.create', ['language'=>app()->getLocale()]) }}">Add</a>
@endsection
@section('content')
<form method="GET" class="admin-toolbar" style="margin-bottom:16px;display:flex;gap:12px;align-items:end;flex-wrap:wrap">
    <div class="genzis-field" style="margin:0;min-width:220px">
        <label for="catalog">{{ __('Catalog') }}</label>
        <select id="catalog" name="catalog" onchange="this.form.submit()">
            <option value="">{{ __('All catalogs') }}</option>
            @foreach(\App\Models\Product::CATALOGS as $value => $label)
                <option value="{{ $value }}" @selected(($catalog ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
</form>
<div class="admin-grid" style="grid-template-columns:1fr 1fr;gap:16px">
    <section class="genzis-card admin-panel">
        <h2 class="admin-panel__title" style="margin-bottom:16px">Categories</h2>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Name</th><th>Catalog</th><th>Subs</th><th></th></tr></thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name_en }}</strong><div class="admin-muted">{{ $category->name_fr }}</div></td>
                        <td>{{ \App\Models\Product::CATALOGS[$category->catalog] ?? $category->catalog }}</td>
                        <td>{{ $category->subcategories_count }}</td>
                        <td>
                            <div class="admin-actions-inline">
                                <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.product-categories.edit', ['language'=>app()->getLocale(),'product_category'=>$category->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.product-categories.destroy', ['language'=>app()->getLocale(),'product_category'=>$category->id]) }}" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="admin-muted">No categories.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}
    </section>
    <section class="genzis-card admin-panel">
        <h2 class="admin-panel__title" style="margin-bottom:16px">Subcategories</h2>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead><tr><th>Name</th><th>Parent</th></tr></thead>
                <tbody>
                @forelse($subcategories as $sub)
                    <tr>
                        <td><strong>{{ $sub->name_en }}</strong></td>
                        <td>{{ $sub->category->name_en ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="admin-muted">No subcategories.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $subcategories->links() }}
    </section>
</div>
@endsection
