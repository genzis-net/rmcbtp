@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('heading', 'Edit category')
@section('subheading', 'Update names and catalogue assignment')
@php $locale = app()->getLocale(); @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ route('admin.product-categories.update', ['language'=>$locale,'product_category'=>$category->id]) }}">
        @csrf @method('PUT')

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Category details</h3>
                <p>Changes apply to filters on the public catalogue.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="catalog">Catalog</label>
                    <select id="catalog" name="catalog" required>
                        @foreach(\App\Models\Product::CATALOGS as $value => $label)
                            <option value="{{ $value }}" @selected(old('catalog', $category->catalog) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="genzis-field">
                    <label for="name_en">Name (EN)</label>
                    <input id="name_en" name="name_en" value="{{ old('name_en', $category->name_en) }}" required>
                </div>
                <div class="genzis-field">
                    <label for="name_fr">Name (FR)</label>
                    <input id="name_fr" name="name_fr" value="{{ old('name_fr', $category->name_fr) }}" required>
                </div>
                <div class="genzis-field full">
                    <label for="description_en">Description (EN)</label>
                    <textarea id="description_en" name="description_en">{{ old('description_en', $category->description_en) }}</textarea>
                </div>
                <div class="genzis-field full">
                    <label for="description_fr">Description (FR)</label>
                    <textarea id="description_fr" name="description_fr">{{ old('description_fr', $category->description_fr) }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.product-categories.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Update category</button>
        </div>
    </form>
</section>
@endsection
