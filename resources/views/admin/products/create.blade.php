@extends('admin.layouts.app')
@section('title', isset($product) ? 'Edit Product' : 'New Product')
@section('heading', isset($product) ? 'Edit product' : 'New product')
@section('subheading', 'Add an item to Quincaillerie or Sims Decor')
@php $locale = app()->getLocale(); $item = $product ?? null; @endphp
@section('content')

@if(!empty($item) && $item->images->isNotEmpty())
<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <div class="admin-panel__head">
        <div>
            <h2 class="admin-panel__title">Current gallery</h2>
            <p class="admin-panel__meta">Delete images here — outside the product form to avoid nested forms.</p>
        </div>
    </div>
    <div class="admin-media-grid">
        @foreach($item->images as $image)
            <div class="admin-media-card">
                <img src="{{ $image->url() }}" alt="{{ $item->name }}">
                <form method="POST" action="{{ route('admin.products.images.destroy', ['language'=>$locale,'image'=>$image->id]) }}" onsubmit="return confirm('Delete this image?')">
                    @csrf @method('DELETE')
                    <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</section>
@endif

<section class="genzis-card admin-panel">
    <form class="admin-form admin-form--wide" method="POST" enctype="multipart/form-data"
          action="{{ $item ? route('admin.products.update', ['language'=>$locale,'product'=>$item]) : route('admin.products.store', ['language'=>$locale]) }}">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Basics</h3>
                <p>Name, catalogue channel, and pricing shown on the public site.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="name_en">{{ __('Name') }} (EN)</label>
                    <input id="name_en" name="name_en" value="{{ old('name_en', $item->name_en ?? $item->name ?? '') }}" required>
                    @error('name_en')<p class="error">{{ $message }}</p>@enderror
                </div>
                <div class="genzis-field">
                    <label for="name_fr">{{ __('Name') }} (FR)</label>
                    <input id="name_fr" name="name_fr" value="{{ old('name_fr', $item->name_fr ?? $item->name ?? '') }}" required>
                    @error('name_fr')<p class="error">{{ $message }}</p>@enderror
                </div>
                <div class="genzis-field">
                    <label for="catalog">Catalog</label>
                    <select id="catalog" name="catalog" required>
                        @foreach($catalogs as $value => $label)
                            <option value="{{ $value }}" @selected(old('catalog', $item->catalog ?? 'quincaillerie') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('catalog')<p class="error">{{ $message }}</p>@enderror
                </div>
                <div class="genzis-field">
                    <label for="price">Price (XAF)</label>
                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $item->price ?? 0) }}" required>
                    @error('price')<p class="error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Classification</h3>
                <p>Subcategories are filtered by the selected catalogue.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="subcat_id">Subcategory</label>
                    <select id="subcat_id" name="subcat_id">
                        <option value="">—</option>
                        @foreach($categories as $cat)
                            <option
                                value="{{ $cat->id }}"
                                data-catalog="{{ optional($cat->category)->catalog }}"
                                @selected(old('subcat_id', $item->subcat_id ?? '') == $cat->id)
                            >
                                {{ optional($cat->category)->name_en ? $cat->category->name_en.' — ' : '' }}{{ $cat->name_en }}
                            </option>
                        @endforeach
                    </select>
                    @error('subcat_id')<p class="error">{{ $message }}</p>@enderror
                </div>
                <div class="genzis-field">
                    <label for="material_id">Material</label>
                    <select id="material_id" name="material_id">
                        <option value="">—</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}" @selected(old('material_id', $item->material_id ?? '') == $material->id)>{{ $material->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="genzis-field">
                    <label for="id_number">ID number</label>
                    <input id="id_number" name="id_number" value="{{ old('id_number', $item->id_number ?? '') }}" placeholder="Optional">
                </div>
                <div class="genzis-field">
                    <label for="uniq_id">Unique ID</label>
                    <input id="uniq_id" name="uniq_id" value="{{ old('uniq_id', $item->uniq_id ?? '') }}" placeholder="Auto-generated if empty">
                    <p class="genzis-hint">Leave blank to generate a reference automatically.</p>
                    @error('uniq_id')<p class="error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Visibility</h3>
                <p>Featured items appear in the landing carousel; active items appear in the catalogue.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <input type="hidden" name="is_active" value="0">
                    <label class="genzis-check" for="is_active">
                        <input id="is_active" type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                        <span>Active <small>Visible in the public catalogue</small></span>
                    </label>
                </div>
                <div class="genzis-field">
                    <input type="hidden" name="is_featured" value="0">
                    <label class="genzis-check" for="is_featured">
                        <input id="is_featured" type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $item->is_featured ?? false))>
                        <span>Featured <small>Shown in the landing page carousel</small></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Descriptions</h3>
                <p>Bilingual copy for product detail pages.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="description_en">Description (EN)</label>
                    <textarea id="description_en" name="description_en">{{ old('description_en', $item->description_en ?? '') }}</textarea>
                </div>
                <div class="genzis-field full">
                    <label for="description_fr">Description (FR)</label>
                    <textarea id="description_fr" name="description_fr">{{ old('description_fr', $item->description_fr ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Add images</h3>
                <p>Select multiple files. The oldest remaining image is used as the cover.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="images">Images</label>
                    <input id="images" type="file" name="images[]" accept="image/*" multiple>
                    <p class="genzis-hint">Up to 12 JPG, PNG, or WEBP files (max 4MB each).</p>
                    @error('images')<p class="error">{{ $message }}</p>@enderror
                    @error('images.*')<p class="error">{{ $message }}</p>@enderror
                    <div id="images-preview" class="admin-media-grid" style="margin-top:12px"></div>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save product</button>
        </div>
    </form>
</section>
@endsection

@push('scripts')
<script>
(function () {
  var input = document.getElementById('images');
  var preview = document.getElementById('images-preview');
  var catalog = document.getElementById('catalog');
  var subcat = document.getElementById('subcat_id');

  if (input && preview) {
    input.addEventListener('change', function () {
      preview.innerHTML = '';
      Array.from(input.files || []).forEach(function (file) {
        if (!file.type.match(/^image\//)) return;
        var card = document.createElement('div');
        card.className = 'admin-media-card';
        var img = document.createElement('img');
        img.alt = file.name;
        img.src = URL.createObjectURL(file);
        card.appendChild(img);
        preview.appendChild(card);
      });
    });
  }

  function filterSubcats() {
    if (!catalog || !subcat) return;
    var selected = catalog.value;
    Array.from(subcat.options).forEach(function (opt, index) {
      if (index === 0) {
        opt.hidden = false;
        return;
      }
      var match = !opt.dataset.catalog || opt.dataset.catalog === selected;
      opt.hidden = !match;
      if (!match && opt.selected) {
        subcat.value = '';
      }
    });
  }

  if (catalog) {
    catalog.addEventListener('change', filterSubcats);
    filterSubcats();
  }
})();
</script>
@endpush
