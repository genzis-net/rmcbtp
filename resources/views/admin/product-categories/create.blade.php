@extends('admin.layouts.app')
@section('title', 'Add Category')
@section('heading', 'Add category or subcategory')
@section('subheading', 'Organize catalogue products for filters')
@php $locale = app()->getLocale(); @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ route('admin.product-categories.store', ['language'=>$locale]) }}">
        @csrf

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Type</h3>
                <p>Create a top-level category or a subcategory under an existing one.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="type">What are you creating?</label>
                    <select id="type" name="type">
                        <option value="category">Category</option>
                        <option value="subcategory">Subcategory</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Details</h3>
                <p>Names appear in admin filters and on the public catalogue.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field" id="catalog-wrap">
                    <label for="catalog">Catalog</label>
                    <select id="catalog" name="catalog" required>
                        @foreach(\App\Models\Product::CATALOGS as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="genzis-field full" id="parent-wrap" style="display:none">
                    <label for="cat_id">Parent category</label>
                    <select id="cat_id" name="cat_id">
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name_en }} ({{ \App\Models\Product::CATALOGS[$parent->catalog] ?? $parent->catalog }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="genzis-field">
                    <label for="name_en">Name (EN)</label>
                    <input id="name_en" name="name_en" required>
                </div>
                <div class="genzis-field">
                    <label for="name_fr">Name (FR)</label>
                    <input id="name_fr" name="name_fr" required>
                </div>
                <div class="genzis-field full" id="desc-en-wrap">
                    <label for="description_en">Description (EN)</label>
                    <textarea id="description_en" name="description_en"></textarea>
                </div>
                <div class="genzis-field full" id="desc-fr-wrap">
                    <label for="description_fr">Description (FR)</label>
                    <textarea id="description_fr" name="description_fr"></textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.product-categories.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Create</button>
        </div>
    </form>
</section>
@endsection
@push('scripts')
<script>
document.getElementById('type').addEventListener('change', function () {
  var sub = this.value === 'subcategory';
  document.getElementById('parent-wrap').style.display = sub ? 'block' : 'none';
  document.getElementById('catalog-wrap').style.display = sub ? 'none' : 'block';
  document.getElementById('desc-en-wrap').style.display = sub ? 'none' : 'block';
  document.getElementById('desc-fr-wrap').style.display = sub ? 'none' : 'block';
  document.getElementById('catalog').required = !sub;
});
</script>
@endpush
