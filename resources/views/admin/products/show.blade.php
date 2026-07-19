@extends('admin.layouts.app')
@section('title', $product->localizedName())
@section('heading', $product->localizedName())
@section('subheading', ($product->catalogLabel() ?? '') . ' · ' . ($product->uniq_id ?? ''))
@section('actions')
<a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.products.edit', ['language'=>app()->getLocale(),'product'=>$product]) }}">Edit</a>
@endsection
@php $locale = app()->getLocale(); @endphp
@section('content')
<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <div class="admin-form-grid">
        <div>
            <p class="admin-muted" style="margin:0 0 4px">Price</p>
            <strong>{{ $product->formattedPrice() }}</strong>
        </div>
        <div>
            <p class="admin-muted" style="margin:0 0 4px">Status</p>
            <strong>{{ $product->is_active ? 'Active' : 'Hidden' }}{{ $product->is_featured ? ' · Featured' : '' }}</strong>
        </div>
        <div>
            <p class="admin-muted" style="margin:0 0 4px">Category</p>
            <strong>{{ $product->subcategory->name_en ?? '—' }}</strong>
        </div>
        <div>
            <p class="admin-muted" style="margin:0 0 4px">Material</p>
            <strong>{{ $product->material->name_en ?? '—' }}</strong>
        </div>
    </div>
    @if($product->description_en || $product->description_fr)
        <p style="margin-top:16px">{{ $product->localizedDescription() }}</p>
    @endif
</section>

<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <div class="admin-panel__head">
        <div>
            <h2 class="admin-panel__title">Gallery</h2>
            <p class="admin-panel__meta">{{ $product->images->count() }} image(s) — first image is the catalogue cover</p>
        </div>
    </div>

    @if($product->images->count())
        <div class="admin-media-grid" style="margin-bottom:18px">
            @foreach($product->images as $image)
                <div class="admin-media-card">
                    <img src="{{ $image->url() }}" alt="{{ $product->localizedName() }}">
                    <form method="POST" action="{{ route('admin.products.images.destroy', ['language'=>$locale,'image'=>$image->id]) }}" onsubmit="return confirm('Delete this image?')">
                        @csrf @method('DELETE')
                        <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="admin-muted" style="margin-bottom:18px">No images yet. Upload several below.</p>
    @endif

    <form class="admin-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.images.upload', ['language'=>$locale,'product'=>$product]) }}">
        @csrf
        <div class="admin-form__section" style="padding-top:0">
            <div class="admin-form__section-head">
                <h3>Add more images</h3>
                <p>Select multiple files at once.</p>
            </div>
            <div class="genzis-field">
                <label for="images">Images</label>
                <input id="images" type="file" name="images[]" accept="image/*" multiple required>
                <div id="images-preview" class="admin-media-grid" style="margin-top:12px"></div>
            </div>
        </div>
        <div class="admin-form__footer admin-form__footer--start">
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Upload images</button>
        </div>
    </form>
</section>
@endsection

@push('scripts')
<script>
(function () {
  var input = document.getElementById('images');
  var preview = document.getElementById('images-preview');
  if (!input || !preview) return;
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
})();
</script>
@endpush
