@extends('admin.layouts.app')
@section('title', $gallery->name)
@section('heading', $gallery->name)
@section('subheading', 'Upload and manage gallery images')
@section('actions')
<a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.galleries.edit', ['language'=>app()->getLocale(),'gallery'=>$gallery]) }}">Edit details</a>
@endsection
@section('content')
<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <h2 class="admin-panel__title" style="margin-bottom:12px">Upload images</h2>
    <form class="admin-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.galleries.images.upload', ['language'=>app()->getLocale(),'gallery'=>$gallery]) }}">
        @csrf
        <div class="genzis-field">
            <label for="images">Images</label>
            <input id="images" type="file" name="images[]" accept="image/*" multiple required>
        </div>
        <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Upload</button>
    </form>
</section>

<section class="genzis-card admin-panel">
    <h2 class="admin-panel__title" style="margin-bottom:16px">Images ({{ $gallery->images->count() }})</h2>
    @if($gallery->images->count())
        <div class="admin-media-grid">
            @foreach($gallery->images as $image)
                <div class="admin-media-card">
                    <img src="{{ asset('storage/'.$image->path) }}" alt="{{ $image->alt_text ?: $image->title }}">
                    <form method="POST" action="{{ route('admin.galleries.images.destroy', ['language'=>app()->getLocale(),'gallery'=>$gallery,'image'=>$image]) }}" onsubmit="return confirm('Delete image?')">
                        @csrf @method('DELETE')
                        <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="admin-muted">No images yet.</p>
    @endif
</section>
@endsection
